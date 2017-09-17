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

      <!-- <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
             
              <h3>วิชา</h3>
              <select name="subject" class="form-control">
			
				</select>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              
              <h3>ระดับชั้น</h3>
              <select name="level" class="form-control">
			
				</select>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              
              <h3>วัน</h3>
              <select name="day" class="form-control">
				
				</select>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              
              <h3>ช่วงเวลา</h3>
              <select name="duration" class="form-control">
				
				</select>
            </div>
          </div>
        </div>
      </div> -->

      <!-- <div class="container">
        <div class="row">
        <div class="col-lg-3 col-md-3 text-center">
            <div class="service-box">
              <h3>แขวง</h3>
              <input type="text" id="district" class="form-control">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 text-center">
            <div class="service-box">
              <h3>เขต</h3>
              <input type="text" id="amphoe" class="form-control">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 text-center">
            <div class="service-box">
              <h3>จังหวัด</h3>
              <input type="text" id="province" class="form-control">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 text-center">
            <div class="service-box">
              <h3>รหัสไปรษณีย์</h3>
              <input type="text" id="zipcode" class="form-control">
            </div>
          </div>
        </div>
      </div> -->
        <form method="post" action="/createcourselearner">
     <div class="container text-center">
         <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="filter-select row">
                        <div class="col-md-3">
                          <label>ชื่อวิชา</label>
                            <select id="filterBySubject" class="form-control">
                            <?php
                                foreach($subject as $key =>$value){
                                  echo '<option value="'.$value->subjects_id.'">'.$value->subject_name.'</option>' ;
                                }			
                              ?>
                               @foreach (Theme::get('subject') as $obj)
                                  <div class="col-md-4"> 
                                <table>
                                  <td><input type="checkbox" value="{{$obj->subjects_id}}" name="subject[]">{{$obj->subject}}</td>
                                </table>
                                </div>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label>ระดับชั้น</label>
                            <select id="filterByLevel"  class="form-control">
                            <?php
                            foreach($level as $key =>$value){
                              echo '<option value="'.$value->levels_id.'">'.$value->level_name.'</option>' ;
                            }			
                            ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                        <label>วัน</label>
                          <select id="filterByDay"  class="form-control">
                          
                          <?php
                          foreach($day as $key =>$value){
                            echo '<option value="'.$value->day_id.'">'.$value->dayfull.'</option>' ;
                          }			
                          ?>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>ช่วงเวลา</label>   
                            <select id="filterByDuration"  class="form-control">
                            <?php
                            foreach($duration as $key =>$value){
                              echo '<option value="'.$value->duration_id.'">'.$value->duration_name.'</option>' ;
                            }			
                            ?>
                            </select>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                          <label>แขวง</label>
                            <input type="text" id="district" class="form-control">
                          </div>
                          <div class="col-md-3">
                          <label>เขต</label>
                            <input type="text" id="amphoe" class="form-control">
                          </div>
                          <div class="col-md-3">
                          <label>จังหวัด</label>
                            <input type="text" id="province" class="form-control">
                          </div>
                          <div class="col-md-3">
                          <label>รหัสไปรษณีย์</label>
                            <input type="text" id="zipcode" class="form-control">
                          </div>
			                  </div>
                    </div>
                  </div>
                </div>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="submit">สร้างคอร์สเรียน</a>
              </div>
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
