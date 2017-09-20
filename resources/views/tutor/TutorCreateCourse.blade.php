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
            <h2 class="section-heading">สร้างคอร์สเรียนของฉัน</h2>
            <hr class="primary">
          </div>
        </div>
      </div>

    
        <form method="post" action="/createcourselearner">
     <div class="container text-center">
    
                <div class="row">
                
                         <label>วิชาที่สอนได้</label>
                          <div class="row">
                            @foreach ($subject as $obj)
                            <div class="col-md-3"> 
                                <table>
                                    <td><input type="checkbox" value="{{$obj->subjects_id}}" name="subject[]">{{$obj->subject_name}}</td>
                                </table>
                            </div>
                            @endforeach
                            </div>

                            <label>ระดับชั้นสอนได้</label>
                          <div class="row">
                            @foreach ($level as $obj)
                            <div class="col-md-3"> 
                                <table>
                                    <td><input type="checkbox" value="{{$obj->levels_id}}" name="level[]">{{$obj->level_name}}</td>
                                </table>
                            </div>
                            @endforeach
                            </div>
                          
                            <label>วันที่สามารถสอนได้</label>
                          <div class="row">
                            @foreach ($day as $obj)
                            <div class="col-md-2"> 
                                <table>
                                    <td><input type="checkbox" value="{{$obj->day_id}}" name="day[]">{{$obj->dayfull}}</td>
                                </table>
                            </div>
                            @endforeach
                            </div>
                            
                            <label>ช่วงเวลาที่สามารถสอนได้</label>
                          <div class="row">
                            @foreach ($duration as $obj)
                            <div class="col-md-3"> 
                                <table>
                                    <td><input type="checkbox" value="{{$obj->duration_id}}" name="duration[]">{{$obj->duration_name}}</td>
                                </table>
                            </div>
                            @endforeach
                            </div>
                       
                        
<!--                       
                        <div class="row">
                          <div class="col-lg-3 col-md-3 text-center">
                          <label>แขวง</label>
                            <input type="text" id="district" class="form-control">
                          </div>
                          <div class="col-lg-3 col-md-3 text-center">
                          <label>เขต</label>
                            <input type="text" id="amphoe" class="form-control">
                          </div>
                          <div class="col-lg-3 col-md-3 text-center">
                          <label>จังหวัด</label>
                            <input type="text" id="province" class="form-control">
                          </div>
                          <div class="col-lg-3 col-md-3 text-center">
                          <label>รหัสไปรษณีย์</label>
                            <input type="text" id="zipcode" class="form-control">
                          </div>
			                  </div> -->
                    
                  </div>
                </div>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="submit">สร้างคอร์สเรียน</a>
              
            </form>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
         
            
          </div>
        </div>
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

  
  </body>

</html>
