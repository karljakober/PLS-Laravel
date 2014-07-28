<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Homepage Example - Semantic</title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="/semantic/packaged/definitions/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="/css/pong.css">

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="/semantic/packaged/definitions/javascript/semantic.js"></script>
  <script src="/js/pong.js"></script>

</head>
<body id="pls" class="index" ontouchstart="">
    @if(Auth::check())
        @include('elements.sidebar')
    @endif

    @include('elements.navbar')

    @yield('content')
</body>

</html>
