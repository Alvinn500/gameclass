<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{asset("img/favicon.ico")}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.min.css">
    <title>{{$title}}</title>
</head>
    <body class="bg-secondary">
        {{$slot}}
        <script src="https://kit.fontawesome.com/5fe78a9205.js" crossorigin="anonymous"></script>
    </body>
</html>