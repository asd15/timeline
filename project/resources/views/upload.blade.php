<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">

</head>
<body>

<div>
    <form method="POST" action="{{ url('/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="drop-zone">
            <span class="drop-zone__prompt">Drop file here or click to upload</span>
            <input type="file" name="img" class="drop-zone__input">
        </div><br>

        <label class="lbl">Photo Date</label>
        <input class="lbl" type="date" id="photodate" name="photodate"><br>
        <button class="btn" type="submit">upload file</button>
    </form>
</div>

<script src="{{ 'js/upload.js' }}"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
