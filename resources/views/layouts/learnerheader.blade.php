<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>หาติว ดีลงาน</title>

    <link rel="shortcut icon" href="/img/shortLogoHTDNG.png">
    
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
    body {
        
        background-image: url("/img/learner.png");
        background-size: auto;
        background-repeat: no-repeat;
        background-position: left;
        background-attachment: fixed;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .desc {
        padding: 15px;
        text-align: center;
    }
  </style>
<body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" style="color:#f05f40;" href="{{url('/firstpage')}}">หาติว ดีลงาน</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item"><a class="nav-link" style="color:#f05f40;" href="{{url('/learnerhome')}}">หน้าหลัก</a></li> -->
                    <li class="nav-item"><a class="nav-link" style="color:#f05f40;" href="{{url('/learnermycourse')}}">คอร์สของฉัน</a></li>
                    <li class="nav-item"><a class="nav-link" style="color:#f05f40;" href="{{url('/learnercreatecourse')}}">สร้างคอร์สเรียน</a></li>
                    <li class="nav-item"><a class="nav-link" style="color:#f05f40;" href="{{url('/learnerhistory')}}">ประวัติการเรียน</a></li>
                    <li class="nav-item"><a class="nav-link" style="color:#f05f40;" href="{{url('/learnercoursestatus')}}">สถานะคอร์สเรียนที่ฉันสร้าง</a></li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:#f05f40;" href="{{ url('/login') }}">ลงชื่อเข้าใช้งาน</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:#f05f40;" href="{{ url('/register') }}">สมัครสมาชิก</a></li>
                    @else
                        <!-- <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" style="color:#f05f40;" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                ออกจากระบบ
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li> -->
                        <div class="dropdown" style="margin-left:15px;">
                            <div class="row">
                            <img border="0" src="{{$learnerProfile->img_profile}}" class="img-circle img-responsive" 
                            id="menu1" data-toggle="dropdown"  style="border-radius:50%;cursor: pointer;object-position:center;object-fit: cover; margin-left:10px" alt="Cinque Terre" width="40px" height="40px">
                            <a class="nav-link js-scroll-trigger" style="color:#f05f40;cursor: pointer;" id="menu1" data-toggle="dropdown">{{$learnerProfile->username}}</a>
                            <img border="0" src="/img/sort-down.png" class="img-circle img-responsive" 
                            id="menu1" data-toggle="dropdown"  style="object-position:center;cursor: pointer;margin-left:3px;margin-top:10px" alt="Cinque Terre" width="20px" height="20px">
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <center>
                                <li>
                                    <a href="{{url('/learnerprofile')}}"><img border="0" src="{{$learnerProfile->img_profile}}" class="img-circle img-responsive" 
                                    style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px" alt="Cinque Terre" width="100px" height="100px"></a>
                                    <a class="nav-link js-scroll-trigger" style="color:#f05f40;" href="{{url('/learnerprofile')}}">
                                        ดูโปรไฟล์
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" style="color:#FFFFFF;background-color:#f05f40;" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        ออกจากระบบ
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                </center>
                            </ul>
                            </div>
                        </div>
                        <!-- <div class="dropdown">
                            <a href="{{url('/learnerprofile')}}"><img border="0" src="{{$learnerProfile->img_profile}}" class="img-circle img-responsive" 
                            id="menu1" data-toggle="dropdown"  style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px" alt="Cinque Terre" width="40px" height="40px"></a>
                        <div class="dropdown-content">
                            <a href="{{url('/learnerprofile')}}"><img border="0" src="{{$learnerProfile->img_profile}}" class="img-circle img-responsive" 
                            style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px" alt="Cinque Terre" width="40px" height="40px"></a>
                            <div class="dropdown-content">
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" style="color:#f05f40;" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        ออกจากระบบ
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </div>
                        </div> -->

                        

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
        <script src="{{ url('') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ url('') }}/vendor/popper/popper.min.js"></script>
        <script src="{{ url('') }}/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="{{ url('') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="{{ url('') }}/vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="{{ url('') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="{{ url('') }}/js/creative.min.js"></script>
        @yield('script')
</body>
</html>
