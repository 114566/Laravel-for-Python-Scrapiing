<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi user-scalable=0' >
  <meta http-equiv="X-UA-Compatible" content="ie=edge" >
  <title>@yield('title')</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="{{ asset('asset/img/icon.png') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}" />
  <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/js/custom-selectbox.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <style>
    body {
      font-family: 'Nunito';
    }
  </style>
</head>

<body class="antialiased">
  @yield('header')
  @yield('content')
</body>

</html>
