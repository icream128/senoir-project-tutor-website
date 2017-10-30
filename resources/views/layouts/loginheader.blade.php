<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>หาติว ดีลงาน</title>

    <link rel="shortcut icon" href="{{url('/img/shortLogoHTDNG.png')}}">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
        
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

  </head>

  <style>
    #mainNavt {
        border-color:rgba(255,255,255,.3);
        background-color:#F98717;

       }
  </style>
<body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNavt">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{url('/firstpage')}}" style="color: white;">หาติว ดีลงาน</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color: white;" href="{{url('/login')}}">ลงชื่อเข้าใช้งาน</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color: white;" href="{{url('/register')}}">สมัครสมาชิก</a></li>
                </ul>
                </div>
            </div>
        </nav>

        <br>
        <br>
        <br>
        <br>

        @yield('content')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Bootstrap core JavaScript -->
        <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{url('vendor/popper/popper.min.js')}}"></script>
        <script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- Plugin JavaScript -->
        <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{url('vendor/scrollreveal/scrollreveal.min.js')}}"></script>
        <script src="{{url('vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{url('js/creative.min.js')}}"></script>
        
</body>
</html>
@yield('script')