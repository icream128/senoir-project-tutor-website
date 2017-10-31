<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>หาติว ดีลงาน</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">หาติว ดีลงาน</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">หาติว ดีลงาน</h1>
          <hr>
          <p>เรียน/สอนพิเศษตัวต่อตัว ทุกวิชา ทุกระดับชั้น ทุกวันเวลา กับหาติว ดีลงาน</p>
         
        </div>
      </div>
    </header>
    @foreach($tutorschedule as $obj) 
                                    <div class="col-sm-12 col-lg-12 col-md-12 course-list">
                                    <div class="col-md-6">
                                        <div class="col-md-8 col-md-offset-2">
                                         <br><br>
                                            <img src="{{$obj->tutor_image_profile}}" alt="img_proflie" style="width:400px;height:400px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <br><br>
                                          <h4>บัญชีผู้ใช้ :{{$obj->username}}</h4>
                                           <h4> ชื่อ-นามสกุล :{{$obj->firstname}}{{$obj->lastname}}</h4>
                                            <h4>ชื่อเล่น : {{$obj->nickname}}</h4> 
                                           <h4> เพศ : {{$obj->gender}}</h4>
                                           <h4> อายุ :  {{$obj->age}}ปี</h4>
                                            <h4>ปัจจุบันศึกษาอยู่ที่ : {{$obj->tutor_school}}</h4>
                                            <h4>เกรด : {{$obj->tutor_grade}}</h4>
                                           <h4> วิชา :{{$obj->subject_name}} </h4>
                                           <h4> ชัั้น : {{$obj->level_name}}</h4>
                                            <h4>วัน : {{$obj->dayfull}}</h4>
                                            <h4>ช่วงเวลา : {{$obj->duration_name}} </h4>
                                        
                                    </div>
                            </div> 
                                		
                                @endforeach
   


    


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
