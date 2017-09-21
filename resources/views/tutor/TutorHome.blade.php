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
            <h2 class="section-heading">ค้นหาคอร์สสอน</h2>
            <hr class="primary">
          </div>
        </div>
      </div>
      <div class="container">
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
              <!-- <div class="col-md-3">
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
              </div>        -->
          </div>
        </div>
        <div class="row">
          <div id="tagGroup">
            
          </div>
        </div>
          <div class="row" id="result">
            <div class="col-md-12">
               <table class="table" id="datatable">
                  <thead>
                     <th><h3>รายละเอียดคอร์สสอน</h3></th>
                     <!-- <th><h3>ระดับชั้น</h3></th>
                     <th><h3>วัน</h3></th>
                     <th><h3>เวลา</h3></th> -->
                  </thead>
                  <tbody id="data-table-block">
                  @foreach($learnerSchedule as $key =>$value)
                     <tr class="data-table">
                        <td><h4 class="subject_name">{{$value->subject_name}}</h4></td>
                        <td><h4 class="level_name">{{$value->level_name}}</h4></td>
                        <td><h4 class="dayfull">{{$value->dayfull}}</h4</td>
                        <td><h4 class="duration_name">{{$value->duration_name}}</h4</td>
                        <td><a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">ดูรายละเอียดเพิ่มเติม</a></td>
                        <!-- <td><a href=""><h4 class="district"></h4></a></td>
                        <td><a href=""><h4 class="amphoe"></h4></a></td>
                        <td><a href=""><h4 class="province"></h4></a></td>
                        <td><a href=""><h4 class="zipcode"></h4></a></td> -->
                     </tr>
                  @endforeach
                  </tbody>
               </table>
               {{ $learnerSchedule->appends(['sort' => 'subject_name'])->links() }}
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

