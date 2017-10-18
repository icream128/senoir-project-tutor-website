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
<body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{url('/firstpage')}}" style="color: #FF8000;">หาติว ดีลงาน</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link " style="color: #FF8000;" href="{{url('/tutorhome')}}">หน้าหลัก</a></li>
                    <li class="nav-item"><a class="nav-link " style="color: #FF8000;" href="{{url('/tutormycourse')}}">คอร์สของฉัน</a></li>
                    <li class="nav-item"><a class="nav-link " style="color: #FF8000;" href="{{url('/tutorfav')}}">คอร์สที่สนใจ</a></li>
                    <li class="nav-item"><a class="nav-link " style="color: #FF8000;" href="{{url('/tutorhistory')}}">ประวัติการสอน</a></li>
                    <li class="nav-item"><a class="nav-link " style="color: #FF8000;" href="{{url('/tutorstatusrequest')}}">สถานะการจองคอร์ส</a></li>
                    <!-- <li class="nav-item"><a class="nav-link " style="color: #FF8000;" href="{{url('/tutorstatusrequest')}}">สถานะของคอร์สที่ฉันสร้าง</a></li> -->
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color: #FF8000;" href="{{url('/login')}}">ลงชื่อเข้าใช้งาน</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color: #FF8000;" href="{{url('/register')}}">สมัครสมาชิก</a></li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" style="color: #FF8000;" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                ออกจากระบบ
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form> 
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/tutorprofile')}}"><img border="0" src="{{$tutorProfile->img_profile}}" class="img-circle img-responsive" 
                                style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px" alt="Cinque Terre" width="40px" height="40px"></a>
                        </li>
                    @endguest
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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/creative.min.js"></script>
        
</body>
</html>
@yield('script')