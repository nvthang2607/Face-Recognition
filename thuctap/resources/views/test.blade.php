<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="nOPQxjpquz9gUVezwKetnWUDJAm2FPK0btyeMSCx" />
    <title>Document</title>
</head>
<body>
    <h1> Thoong tin: <h1 id="test"></h1></h1>
        <button onclick="myFunction()">Click me</button>
    <script>
    function myFunction() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method:"post",
        url: "test2",
        data: {name:"Van Thang"},
        success:function(data){
            $('#test').html(data);
        }
    });
    }
</script>
</body>

</html>