<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>webcam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{asset('css/webcam.css')}}" rel="stylesheet">
</head>
<body>
<h1 class="text-center">WebcamJs Learning</h1>

<div id="uploadForm" class="container d-grid">
    <div id="my_camera" class=""></div>
    <div id="my_result"></div>
    <button class="btn btn-primary btn-lg mt-5" id="upload">Take A Photo</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('vendors/webcamjs/webcam.js')}}"></script>

<script language="JavaScript">
    $(document).ready( () => {
        let uploadBtn = document.querySelector('#upload')
        Webcam.set({
            width: 400,
            height: 300,
            image_format: 'jpeg',
            jpeg_quality: 90
        })

        Webcam.attach('#my_camera');

        Webcam.on('load', () => {
            uploadBtn.addEventListener('click', () => {
                Webcam.snap((dataUri) => {
                    // jquery ajax
                    $.ajax({
                        url: '{{route('upload')}}',
                        type: 'post',
                        data: {
                            _token: '{!!csrf_token()!!}',
                            image: dataUri,
                        }
                    }, (response) => {
                        console.log(response)
                    })
                })
            })
        })
    })
</script>
</body>
</html>






