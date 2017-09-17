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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    div h5 {
        font-size:15px;
    }

    .pad{
        padding-bottom:15px;
    }

    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
            padding-left: 0px;
    }


</style>

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

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">คอร์สเรียนของฉัน</h2>
            <hr class="primary">
          </div>
        </div>
      </div>
      <div class="container">
      @foreach($learnerSchedule as $key =>$value)
    <!-- first -->
    <div class="container" style="background-color:#D8D8D8">
        <div class="row" style="margin:5px">
            <div class="col-lg-3 col-sm-3 text-center" style="padding-bottom=10px;">
                <div class="service-box">              
                    <div class="container">   
                        <img src="{{$value->tutor_image_profile}}" class="img-circle img-responsive" 
                        style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="120" height="120"> 
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 text-right pad">
                <div class="service-box">              
                <h5>ชื่อ :</h5>
                <h5>วิชา :</h5>
                <h5>วัน :</h5>
                <h5>เวลาเริ่ม :</h5>
                <h5>สถานที่ :</h5>
                <h5>สถานะ :</h5>              
                </div>
            </div>

            <div class="col-lg-5 col-sm-5 text-left pad" style="padding-left: 0px;">
                <div class="service-box">              
                <h5>{{$value->firstname}} {{$value->lastname}}</h5>
                <h5>{{$value->subject_name}}</h5>
                <h5>{{$value->dayfull}}</h5>
                <h5>{{date('H:i', strtotime($value->start_time))}}</h5>
                <h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>
                <h5>{{$value->status_name}}</h5>              
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 text-center pad">
                <div calss="service-box">
                    <a class="btn btn-primary " style="font-size:10px;margin:10px" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a>  
                </div>          
            </div>
        </div>          
    </div>
    
    <!-- Modal Popup -->
    <div id="{{$key}}" class="w3-modal">
        <div class="w3-modal-content w3-animate-opacity" style="padding:35px 50px;">
            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-primary w3-button w3-display-topright">&times;</span>
            </header>
            <div class="w3-container">
                <div class="container">
                    <div class="row">        
                        <div class="col-lg-3 col-md-8 text-center" style="padding-bottom=10px;">
                            <div class="service-box">              
                                <div class="container">   
                                    <img src="{{$value->tutor_image_profile}}" class="img-circle img-responsive" 
                                        style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="150" height="150"> 
                                </div>
                            </div>
                        </div>
                        <br>        
                        <div class="col-lg-3 col-md-8 text-right">
                            <div class="service-box">             
                                <h5>ชื่อ :</h5>
                                <h5>วิชา :</h5>
                                <h5>วัน :</h5>
                                <h5>เวลาเริ่ม :</h5>
                                <h5>สถานที่ :</h5>
                                <h5>ราคา/ชั่วโมง :</h5>
                                <h5>สถานะ :</h5>
                                <h5>ติดต่อ :</h5>
                                <h5>รายละเอียดการสอน :</h5>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">
                            <div class="service-box">              
                                <h5>{{$value->firstname}} {{$value->lastname}}</h5>
                                <h5>{{$value->subject_name}}</h5>
                                <h5>{{$value->dayfull}}</h5>
                                <h5>{{date('H:i', strtotime($value->start_time))}}</h5>
                                <h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>
                                <h5>{{$value->price}}</h5>
                                <h5>{{$value->status_name}}</h5>
                                <h5>{{$value->tel}}</h5>    
                                <h5>อยากให้มีข้อสอบตัวอย่างมาให้ฝึกทำด้วย</h5><br>         
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
    @endforeach
        
      </div>
    </section>

  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>


    <script>
      $.Thailand({
    database: '{{URL::asset("themes/alchemist/assets/scripts/jquery.Thailand.js/database/db.json")}}', // path หรือ url ไปยัง database
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#amphoe'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });
</script>
    </script>

  </body>

</html>

