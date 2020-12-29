<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title)? $title:"Mon Super Blog" }}</title>
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-reboot.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css.map') }}">
</head>
<body>
  <div class="container">
    @yield('css')
    @include('blog.nav')
    @yield('content')
    @yield('js')
  </div>

</body>
</html>
