<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            width:100vw;
            height: 100vh;
            display: flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }
        canvas{
            position: absolute;
        }
    </style>
</head>
<body>
    <h1> Thông tin: </h1>
    <div id="test"></div>
    <script>
    window.onload=function(){
        setInterval(async () =>{
            $.ajax({
                method:"get",
                url: "test3",
                success:function(data){
                    $('#test').html(data);
                }
            });
        }, 3000)
    }
    </script>
</body>
</html>