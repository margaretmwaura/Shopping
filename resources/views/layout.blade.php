<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.8.95/css/materialdesignicons.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->

    <!-- Dealing with the mixed content error -->
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<div id="root">
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
