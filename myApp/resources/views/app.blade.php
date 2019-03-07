<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script>
    window.Laravel = {
        csrfToken: "{{ csrf_token() }}"
    };
    </script>
</head>
<body>
<h1>LaravelでSPAチュートリアル</h1>
<div id="app">
    <navbar></navbar>
    <div class="container">
        <router-view></router-view>
    </div>
</div>
</body>

{{-- buildしたjsを読み込む --}}
<script src="{{ mix('js/app.js') }}"></script>

</html>