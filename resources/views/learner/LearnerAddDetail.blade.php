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

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">เพิ่มรายละเอียดคอร์ส</h2>
            <hr class="primary">
          </div>
        </div>
      </div>
      <div class="container">
      <form action="{{ url('/')}}" method='post' enctype="multipart/form-data">    
      <div class="row">
          <div class="col-md-6">
          <label>รายละเอียดบทเรียน</label>
          <textarea placeholder="รายละเอียดบทเรียน" rows="4" cols="50" name="detail" form="usrform" class="form-control"></textarea>
          </div>
          <div class="col-md-6">
          <label>รายละเอียดสถานที่</label>
          <textarea placeholder="รายละเอียดสถานที่" rows="4" cols="50" name="detail" form="usrform" class="form-control"></textarea>
          </div>
         <div class="col-md-6">
         <label>รายละเอียดการเดินทาง</label>
         <textarea placeholder="รายละเอียดการเดินทาง" rows="4" cols="50" name="detail" form="usrform" class="form-control"></textarea>
          </div>
          
          <div class="col-md-6">
              <label>วันที่เริ่มเรียน</label>
              <input type="date" name="startdate"  class="form-control"/>  
          </div>
          <div class="col-md-6">
              <label>เวลาที่เริ่ม</label>
              <input type="time" name="starttime"  class="form-control" />   
          </div>
          <div class="col-md-6">
              <label>เวลาที่จบ</label>
              <input type="time" name="endtime
              "  class="form-control" />   
          </div>
          <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">เพิ่มรายละเอียดคอร์ส</button>
          </div>    
          </form>
          
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

