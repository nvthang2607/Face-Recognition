<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
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
        h1{
            position: absolute;
            margin-top: 646px;
        }
        #test{
            position: absolute;
            margin-top: 830px;
        }
    </style>
</head>
<body>
    <video id="video" width="720" height="550" muted autoplay controls src=""></video>
    <script defer src="./js/face-api.min.js"></script>
    <script defer src="./js/script.js"></script>
    <h1> Thông tin: </h1>
    <div id="test"></div>
    @if(Session::has('name'))
	<div>{{Session::get('name')}}</div>
    @endif  

</body>
</html>