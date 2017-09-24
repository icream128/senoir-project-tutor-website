
@extends('layouts.tutorheader')
<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style media="screen">
  .filtertitle {
    border: 1px solid #e6e6e6;
    padding: 0.25cm 0.5cm 0.25cm;
    border-radius: 5px;
  }
  .fa-times{
    color:#999999;
  }
  .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
  }
  .search-input{
      max-width:500px;
      margin-top:50px;
      margin-bottom:50px;
      margin-right:10px
    }
  .btn-size{
    width:150px;
    height:40px;
  }
  .rows {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: 0px;
      margin-left: 0px;
    }
  </style>
  @section('content')


<body id="page-top" onload="show()">
<br>
      <center>
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6"></div>
          <div class="col-md-3">
          <a href=""><button class="tag-item btn btn-lg btn-danger" style="background-color: #f05f40;">สร้างคอร์สเรียนที่ต้องการ</button></a>
          </div>
        </div>
      <div>

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel" style="center">แจ้งเตือน</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
              ไม่พบติวเตอร์ที่ตรงกับความต้องการของผู้ใช้
            </div>
            <div class="modal-footer">
              <a class="btn btn-primary btn-xl " href="{{url('/learnercreatecourse')}}">เพิ่มคอร์สสอน</a>
            </div>
          </div>
        </div>
      </div>

  <section id="services" class="text-center" style="padding-bottom: 0px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="section-heading">ค้นหาคอร์สเรียน</h1>
          <center><hr></center> 
          <hr class="primary"><br>
          <h4 align="left">
            filter by:
          </h4><br>
        </div>
      </div>
    </div>
    @php
    $subjects = DB::table('subject')->get();
    $durations = DB::table('duration')->get();
    $levels = DB::table('levels')->get();
    $days = DB::table('day')->get();
    @endphp
    <div class="container">
      <div class="btn-group">
        <div class="col-md-1"></div>
          <div class="col-md-10" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;margin-top:35px">
            <div class="dropdown">
              <button type="button" id="dropdownMenuLink" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                วิชา
              </button>
              <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($subject as $subject)
                <a class="dropdown-item" href="javascript:appendTag('subject','{{$subject->subject_name}}','{{$subject->subject_id}}');">{{ $subject->subject_name }}</a>
                @endforeach
              </div>
            </div>	&nbsp;	&nbsp;
            <div class="dropdown">
              <button type="button"  id="dropdownMenuLink2" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                ระดับชั้น
              </button>
              <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuLink2">
                @foreach ($level as $level)
                <a class="dropdown-item" href="javascript:appendTag('level','{{$level->level_name}}','{{$level->level_id}}');">{{ $level->level_name }}</a>
                @endforeach
              </div>
            </div> &nbsp;	&nbsp;
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink3" aria-haspopup="true" aria-expanded="false">
                 ช่วงเวลา
              </button>
              <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuLink3">
                @foreach ($duration as $duration)
                <a class="dropdown-item" href="javascript:appendTag('duration','{{$duration->duration_name}}','{{$duration->duration_id}}');">{{ $duration->duration_name }}</a>
                @endforeach
              </div>
            </div> &nbsp;	&nbsp;
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink4" aria-haspopup="true" aria-expanded="false">
                วัน
              </button>
              <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuLink4">
                @foreach ($days as $day)
                <a class="dropdown-item" href="javascript:appendTag('day','{{$day->dayfull}}','{{$day->day_id}}');">{{ $day->dayfull }}</a>
                @endforeach
              </div>
            </div>&nbsp;	&nbsp;
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink4" aria-haspopup="true" aria-expanded="false">
                เพศ
              </button>
              <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuLink4">
                
              </div>
            </div>&nbsp;	&nbsp;
          </div><br><br><br>
        </div>
      </div>

      <h3 id="subjectsfound" align="left"></h3>
      <br>
      <div class="" id="alltags" align="left">
        Selected Filters:
      </div>
      <br>
      <div class="" id="filtervalue" style="display:none">
      </div>
    </div>
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-1">

        </div>
          <div class="col-md-10 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
            <table class="table"  id="showall">
              <thead>
                <tr>
                  <th style="background-color:#f05f40;color:#ffffff;"><h3>ชื่อวิชา</h3></th>
                  <th style="background-color:#f05f40;color:#ffffff;"><h3>ระดับชั้น</h3></th>
                  <th style="background-color:#f05f40;color:#ffffff;"><h3>วัน</h3></th>
                  <th style="background-color:#f05f40;color:#ffffff;"><h3>เวลา</h3></th>
                  <th style="background-color:#f05f40;color:#ffffff;"></th>
                </tr>
              </thead>
              <tbody id="data-table-block">
                @foreach($tutorSchedule as $key =>$value)
                  <tr class="data-table">
                    <td><h4 class="subject_name">{{$value->subject_name}}</h4></td>
                    <td><h4 class="level_name">{{$value->level_name}}</h4></a></td>
                    <td><h4 class="day_name_full">{{$value->day_name_full}}</h4></a></td>
                    <td><h4 class="duration_name">{{$value->duration_name}}</h4></a></td>
                    <td><a class="btn btn-primary " style="font-size:12px;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a></td>
                    <td><h4 class="gender">{{$value->duration_name}}</h4></a></td>
                  </tr>
                  <!-- Modal Popup -->
                  <div id="{{$key}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity" style="padding:35px 35px;">
                      <header class="w3-container w3-teal"> 
                        <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-primary w3-button w3-display-topright">&times;</span>
                      </header>
                      <!--  -->
                        <div class="w3-container">
                          <div class="container">
                            <div class="row"> 
                                     <!--  -->
                              <div class="col-lg-3 col-md-8 text-center" style="padding-bottom=10px;">
                                <div class="service-box">              
                                  <div class="container">   
                                    <img src="{{$value->tutor_image_profile}}" class="img-circle img-responsive" 
                                    style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="150" height="150"> 
                                  </div>
                                </div>
                              </div>
                              <!--  -->
                              <br>        
                              <div class="col-lg-3 col-md-8 text-right">
                                <div class="service-box">             
                                  <h5>ชื่อ :</h5>
                                  <h5>วิชา :</h5>
                                  <h5>วัน :</h5>
                                  <h5>เวลาเริ่ม :</h5>
                                  <h5>สถานที่ :</h5>
                                  <h5>สถานะ :</h5>
                                  <h5>ติดต่อ :</h5>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">
                                <div class="service-box">              
                                  <h5>{{$value->tutor_firstname}} {{$value->tutor_lastname}}</h5>
                                  <h5>{{$value->subject_name}}</h5>
                                  <h5>{{$value->day_name_full}}</h5>
                                  <h5>{{date('H:i', strtotime($value->start_time))}}</h5>
                                  <h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>
                                  <h5>{{$value->status_name}}</h5>    
                                </div>
                              </div>
                              <!--  -->
                            </div>
                          </div>
                        </div>
                                  <!--  -->
                    </div>
                  </div>
                @endforeach
              </tbody>    
            </table>
            {{ $tutorSchedule->appends(['sort' => 'subject_name'])->links() }}
          </div>
        <div class="col-md-1">

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

  @endsection
  @section('script')
  <script>
    
    $(document).ready(function(){
      $('#btn-search').click(function(){
        $('#myModal').modal('show');
      })
    
    })
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/popper/popper.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>
  <script type="text/javascript">

  var subject_tags = [];
  var level_tags = [];
  var duration_tags = [];
  var day_tags = [];

  var subject_params = "";
  var level_params = "";
  var duration_params = "";
  var day_params = "";

  var alltags = document.getElementById('alltags');
  var tableshowall = document.getElementById("showall");
  var subjectsfound = document.getElementById("subjectsfound");

  function show(){
    params = "";

    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "searching?"+params, false);
    xmlhttp.send();

    var results = JSON.parse(xmlhttp.responseText);


    //CLEAR ROWS
    while(tableshowall.rows.length > 1) {
      tableshowall.deleteRow(1);
    }


    //INSERT RESULTS TO TABLE
    for (var i = 0; i < results.length; i++) {

      var row = tableshowall.insertRow();
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      // cell1.innerHTML = results[i].subjects_id;
      cell1.innerHTML = results[i].subject_name;
      cell2.innerHTML = results[i].level_name;
      cell3.innerHTML = results[i].duration_name;
      cell4.innerHTML = results[i].dayfull;
    }

    subjectsfound.innerHTML = results.length+" Subjects Found";

  }

  function appendTag(type,text,id){
    var chkvalue = [0,0,0,0];
    var params = "";

    switch (type) {
      case "subject":
      subject_params = "";

      if(subject_tags.indexOf(id) === -1){
        subject_tags.push(id);
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'\',\''+text+'\',\''+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
      }

      for (var i = 0; i < subject_tags.length; i++) {
        if(i !== subject_tags.length-1){
          subject_params += "subject_id[]="+subject_tags[i]+"&";
        }else{
          subject_params += "subject_id[]="+subject_tags[i];
        }
      }
      // alert(subject_params);


      //
      // alert("subject!");
      // alert(subject_tags);
      break;
      case "level":
      level_params = "";

      if(level_tags.indexOf(id) === -1){
        level_tags.push(id);
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'\',\''+text+'\',\''+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
      }

      for (var i = 0; i < level_tags.length; i++) {
        if(i !== level_tags.length-1){
          level_params += "level_id[]="+level_tags[i]+"&";
        }else{
          level_params += "level_id[]="+level_tags[i];
        }
      }
      // alert(level_params);

      // alert("level!");
      // alert(level_tags);
      break;
      case "duration":
      duration_params = "";

      if(duration_tags.indexOf(id) === -1){
        duration_tags.push(id);
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'\',\''+text+'\',\''+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
      }

      for (var i = 0; i < duration_tags.length; i++) {
        if(i !== duration_tags.length-1){
          duration_params += "duration_id[]="+duration_tags[i]+"&";
        }else{
          duration_params += "duration_id[]="+duration_tags[i];
        }
      }
      // alert("duration!");
      // alert(duration_tags);
      break;
      case "day":
      day_params = "";

      if(day_tags.indexOf(id) === -1){
        day_tags.push(id);
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'\',\''+text+'\',\''+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
      }

      for (var i = 0; i < day_tags.length; i++) {
        if(i !== day_tags.length-1){
          day_params += "day_id[]="+day_tags[i]+"&";
        }else{
          day_params += "day_id[]="+day_tags[i];
        }
      }

      // alert("day!");
      // alert(day_tags);
      break;
    }

    //JSON REQUEST

    if(subject_tags.length>0){
      chkvalue[0] = 1;

      params = subject_params ;
    }

    if(level_tags.length>0){
      chkvalue[1] = 1;

      if(chkvalue[0] == 1){
        params = subject_params+"&"+level_params;
      }else{
        params = level_params;
      }
    }

    if(duration_tags.length>0){
      chkvalue[2] = 1;

      if(chkvalue[0] == 1 | chkvalue[1] == 1){
        if(chkvalue[0] == 1 & chkvalue[1] == 1){
          params = subject_params+"&"+level_params+"&"+duration_params;
        }else if(chkvalue[0] == 1){
          params = subject_params+"&"+duration_params;
        }else if(chkvalue[1] == 1){
          params = level_params+"&"+duration_params;
        }
      }else{
        params = duration_params;
      }
    }

    if(day_tags.length>0){
      chkvalue[3] = 1;

      if(chkvalue[0] == 1 | chkvalue[1] == 1 | chkvalue[2] == 1){
        if(chkvalue[0] == 1 & chkvalue[1] == 1 & chkvalue[2] == 1){
          params = subject_params+"&"+level_params+"&"+duration_params+"&"+day_params;
        }else if(chkvalue[0] == 1 & chkvalue[1] == 1){
          params = subject_params+"&"+level_params+"&"+day_params;
        }else if(chkvalue[1] == 1 & chkvalue[2] == 1){
          params = level_params+"&"+duration_params+"&"+day_params;
        }else if(chkvalue[0] == 1 & chkvalue[2] == 1){
          params = subject_params+"&"+duration_params+"&"+day_params;
        }else if(chkvalue[0] == 1){
          params = subject_params+"&"+day_params;
        }else if(chkvalue[1] == 1){
          params = level_params+"&"+day_params;
        }else if(chkvalue[2] == 1){
          params = duration_params+"&"+day_params;
        }
      }else{
        params = day_params;
      }
    }


    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "searching?"+params, false);
    xmlhttp.send();

    var results = JSON.parse(xmlhttp.responseText);


    //CLEAR ROWS
    while(tableshowall.rows.length > 1) {
      tableshowall.deleteRow(1);
    }


    //INSERT RESULTS TO TABLE
    for (var i = 0; i < results.length; i++) {

      var row = tableshowall.insertRow();
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      // cell1.innerHTML = results[i].subjects_id;
      cell1.innerHTML = results[i].subject_name;
      cell2.innerHTML = results[i].level_name;
      cell3.innerHTML = results[i].duration_name;
      cell4.innerHTML = results[i].dayfull;
    }

    subjectsfound.innerHTML = results.length+" Subjects Found";

  }

  function detachTag(type,text,id){

    var chkvalue = [0,0,0,0];
    var params = "";

    switch (type) {
      case "subject":
      subject_tags.remove(id);
      // alert("subject!");
      // alert(subject_tags);
      break;
      case "level":
      level_tags.remove(id);
      // alert("level!");
      // alert(level_tags);
      break;
      case "duration":
      duration_tags.remove(id);
      // alert("duration!");
      // alert(duration_tags);
      break;
      case "day":
      day_tags.remove(id);
      // alert("day!");
      // alert(day_tags);
      break;
    }

    if(subject_tags.length>0){
      chkvalue[0] = 1;

      params = subject_params ;
    }

    if(level_tags.length>0){
      chkvalue[1] = 1;

      if(chkvalue[0] == 1){
        params = subject_params+"&"+level_params;
      }else{
        params = level_params;
      }
    }

    if(duration_tags.length>0){
      chkvalue[2] = 1;

      if(chkvalue[0] == 1 | chkvalue[1] == 1){
        if(chkvalue[0] == 1 & chkvalue[1] == 1){
          params = subject_params+"&"+level_params+"&"+duration_params;
        }else if(chkvalue[0] == 1){
          params = subject_params+"&"+duration_params;
        }else if(chkvalue[1] == 1){
          params = level_params+"&"+duration_params;
        }
      }else{
        params = duration_params;
      }
    }

    if(day_tags.length>0){
      chkvalue[3] = 1;

      if(chkvalue[0] == 1 | chkvalue[1] == 1 | chkvalue[2] == 1){
        if(chkvalue[0] == 1 & chkvalue[1] == 1 & chkvalue[2] == 1){
          params = subject_params+"&"+level_params+"&"+duration_params+"&"+day_params;
        }else if(chkvalue[0] == 1 & chkvalue[1] == 1){
          params = subject_params+"&"+level_params+"&"+day_params;
        }else if(chkvalue[1] == 1 & chkvalue[2] == 1){
          params = level_params+"&"+duration_params+"&"+day_params;
        }else if(chkvalue[0] == 1 & chkvalue[2] == 1){
          params = subject_params+"&"+duration_params+"&"+day_params;
        }else if(chkvalue[0] == 1){
          params = subject_params+"&"+day_params;
        }else if(chkvalue[1] == 1){
          params = level_params+"&"+day_params;
        }else if(chkvalue[2] == 1){
          params = duration_params+"&"+day_params;
        }
      }else{
        params = day_params;
      }
    }

    var clearText =  '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'\',\''+text+'\',\''+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
    var $text = $('#alltags');
    $text.html($text.html().replace(clearText, ""));

    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "searching?"+params, false);
    xmlhttp.send();

    var results = JSON.parse(xmlhttp.responseText);


    //CLEAR ROWS
    while(tableshowall.rows.length > 1) {
      tableshowall.deleteRow(1);
    }


    //INSERT RESULTS TO TABLE
    for (var i = 0; i < results.length; i++) {

      var row = tableshowall.insertRow();
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      // cell1.innerHTML = results[i].subjects_id;
      cell1.innerHTML = results[i].subject_name;
      cell2.innerHTML = results[i].level_name;
      cell3.innerHTML = results[i].duration_name;
      cell4.innerHTML = results[i].dayfull;
    }

    subjectsfound.innerHTML = results.length+" Subjects Found";

  }

  Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
      what = a[--L];
      while ((ax = this.indexOf(what)) !== -1) {
        this.splice(ax, 1);
      }
    }
    return this;
  };

</script>
@endsection


