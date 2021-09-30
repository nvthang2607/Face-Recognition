const video=document.getElementById('video')
Promise.all([
    faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('./models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
]).then(start)
function start(){
    //video.src='../videos/test.mp4'
    navigator.getUserMedia(
        {video:{}},
        stream=>video.srcObject=stream,
        err=>console.error(err)
    )
    recognizeFaces()
}
        
async function recognizeFaces(){
    //video.addEventListener('play',()=>{
        const labeledFaceDescriptors = await loadLabeledImages()
        const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.7)
        console.log('playing')
        var count=0
        var tmp=""
        var check=0
        str2=""
        const canvas= faceapi.createCanvasFromMedia(video)
        document.body.append(canvas)
        const displaysize= {width:video.width,height:video.height}
        faceapi.matchDimensions(canvas,displaysize)

        const interval=setInterval(async () => {
            const detections = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()

            const resizedDetections = faceapi.resizeResults(detections, displaysize)
            
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            
            const results = resizedDetections.map((d) => {
                return faceMatcher.findBestMatch(d.descriptor)
            })
            
            var str=results.toString()
            var str2=str.slice(0,str.indexOf("(")-1)
            if(str2!="unknow"){
                if(tmp==str2){
                    tmp=str2
                    count++
                }
                else{
                    tmp=str2
                    count=1
                }
                if(count> 10){
                    load(str2)
                    count=1
                }
            }
            //in ra box
            results.forEach( (result, i) => {
                const box = resizedDetections[i].detection.box
                const drawBox = new faceapi.draw.DrawBox(box,{ label: result.toString() })
                drawBox.draw(canvas)
            })
        }, 200)
    //})
}
function load(str2){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method:"post",
        url: "test2",
        data: {name:str2},
        success:function(data){
            $('#test').html(data);
        }
    });
}

function loadLabeledImages(){
    const labels=['Van Thang','Mam Lun','Black Widow','Captain America','Captain Marvel','Hawkeye','Thor','Tony Stark']
    //const labels=['Van Thang']
    return Promise.all(
        labels.map(async(label)=>{
            const descriptions=[]
            for(let i=1;i<=4;i++){
                const img = await faceapi.fetchImage(`../labeled_images/${label}/${i}.jpg`)
                const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
                descriptions.push(detections.descriptor)
            }
            //document.body.append(label + 'Faces Loaded |')
            return new faceapi.LabeledFaceDescriptors(label,descriptions)
        })
    )
}