<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>{{ isset($websiteTitle) ? $websiteTitle : '' }} :: @yield('pageTitle')</title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>

  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

  <link rel="stylesheet" type="text/css" href="/semantic/packaged/definitions/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="/css/pong.css">

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="/semantic/packaged/definitions/javascript/semantic.js"></script>
  <script src="/js/pong.js"></script>
  <script src="/js/waypoints.js"></script>
  @if(isset($jsIncludes))
    @foreach($jsIncludes as $include)
      {{ HTML::script('js/' . $include) }}
    @endforeach
  @endif

  <link href="/css/nanoscroller.css" rel="stylesheet">

  <script type="text/javascript">
    @if (Session::has('flash_warning') || Session::has('flash_success'))
      $(".delete.icon").bind("click", function(e) {
          e.preventDefault();
          $(this).parent().slideup();
      });
    @endif
  $(function() {
    $(".nano").nanoScroller();
  });
  </script>

</head>
<body id="pls" class="index @if(isset($bodystyle)) {{ $bodystyle }} @endif" ontouchstart="">
    @if(Auth::check())
        @include('elements.sidebar')
    @endif

    @if(Auth::check() && Auth::user()->admin)
        @include('elements.admin_panel')
    @endif

    @include('elements.navbar')

    @if (array_key_exists('pageHeader', View::getSections()))
        <div class="ui segment">
            <div class="container">
                <div class="introduction">
                    <h1 class="ui header inverted">
                        @yield('pageHeader')
                    </h1>
                </div>
            </div>
        </div>
    @endif

    @if (Session::has('flash_warning'))
    <div class="flash container">
        <div class="ui red inverted segment">
            <p>{{ Session::get('flash_warning') }}</p>
            <i class="delete icon"></i>
        </div>
    </div>
    @endif

    @if (Session::has('flash_success'))
    <div class="flash container">
        <div class="ui green inverted segment">
            <p>{{ Session::get('flash_success') }} <i id="deleteflash" class="delete icon right"></i> </p>

        </div>
    </div>
    @endif

    @yield('content')

    @if(Auth::check())
        <!--<script src="/js/json2.js"></script>
        <script src="/js/socket.io.js"></script>
        <script src="/js/nodeClient.js"></script>-->
    @endif

    <script src="/js/jquery.nanoscroller.js"></script>
</body>

</html>
