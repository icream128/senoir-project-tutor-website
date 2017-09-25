@extends('layouts.tutorheader')
<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
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
.btn-tutor {
    color: #fff;
    border-color: #FF8000;
    background-color: #FF8000;
}

.filtertitle {
    border: 1.2px solid #e6e6e6;
    padding: 0.2cm 0.3cm 0.2cm;
    border-radius: 5px;
  }

  .fa-times{
    color:#999999;
  }


</style>

<body onload="show()">

@section('content')
  <br>
    <center>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"></div>
        <div class="col-md-3">
          <a href="{{url('/tutorcreatecourse')}}"><button class="tag-item btn btn-lg btn-danger" style="background-color: #FF8000;">สร้างคอร์สเรียนที่ต้องการ</button></a> 
        </div>
      </div>
    <div>

    <!-- Modal popup -->
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
            <a class="btn btn-primary btn-xl " href="{{url('/tutorcreatecourse')}}" style="background-color: #FF8000;">เพิ่มคอร์สสอน</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <section class="text-center" style="padding-bottom: 0px;">   
      <h1>ค้นหาคอร์ส</h1>
      <center><hr class="btn-tutor"></center>      
    </section>  

    <div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;margin-top:35px">
      <!-- first line -->  
      <div class="container">  
        <div class="filter-select row">

          <div class="col-md-3 ">
            <label>ชื่อวิชา</label>
            <select id="filterBySubject" class="form-control" onchange="javascript:appendTag(this.value)" style="padding: 5px;" value="choose">

                @foreach($subject as $key =>$value)
                  <option value="subject|{{$value->subject_name}}|{{$value->subject_id}}">{{ $value->subject_name }}</option>
                @endforeach
            </select>
          </div>
                    
          <div class="col-md-3">
            <label>ระดับชั้น</label>
            <select id="filterByLevel"  class="form-control" onchange="javascript:appendTag(this.value)" style="padding: 5px;">
                @foreach($level as $key =>$value)
                  <option value="level|{{$value->level_name}}|{{$value->level_id}}">{{$value->level_name}}</option>
                @endforeach
            </select>
          </div>
                        
          <div class="col-md-3">
            <label>วัน</label>
            <select id="filterByDay"  class="form-control" onchange="javascript:appendTag(this.value)" style="padding: 5px;">                       
              @foreach($day as $key =>$value)
                  <option value="day|{{$value->day_name}}|{{$value->day_id}}">{{$value->day_name}}</option>  		
              @endforeach
            </select>
          </div>
                        
          <div class="col-md-3">
            <label>ช่วงเวลา</label>   
            <select id="filterByDuration"  class="form-control" onchange="javascript:appendTag(this.value)" style="padding: 5px;">
              @foreach($duration as $key =>$value)
                  <option value="duration|{{$value->duration_name}}|{{$value->duration_id}}">{{$value->duration_name}}</option>  		
              @endforeach
            </select>
          </div>

         

        </div>
      </div>
      <!-- End first line -->
                  
      <!-- second line -->  
      <!-- <div class="container">
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
      </div> -->
      <!-- End second line -->
    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-1"></div><br>

    </div>
    </div>  

    <div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <h3 id="subjectsfound" align="left"><span style="color:#FF8000;font-weight: bold;">0</span> Subjects Found</h3><br><br>
    </div>
    </div>  
    <!-- <div id="tagGroup"></div> -->
    <div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="" id="alltags" align="left">
        Selected Filters:
      </div>
    </div>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-1"></div><br>
  </div>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 rows" >
    
    <table class="table"  id="showall">
      <thead>
        <tr style="background-color:#FF8000;color:#ffffff;">
          <th>Subject</th>
          <th>Level</th>
          <th>Day</th>
          <th>Duration</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
  </div>
    </div>
    
<!-- 
    <div id="seemore" class="w3-modal">
    <div class="w3-modal-content w3-animate-opacity" style="padding:35px 35px;">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright">&times;</span>
        </header>
        <div class="w3-container">
            <div class="container">
                <div class="row">        
                    <div class="col-lg-3 col-md-8 text-center" style="padding-bottom=10px;">
                        <div class="service-box">              
                            <div class="container">   
                                
                            </div>
                        </div>
                    </div>
                    <br>        
                    <div class="col-lg-3 col-md-8 text-right">
                      
                    </div>

                    <div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">
                        <div class="service-box">              
                                    
                        </div>
                    </div>
                </div>  <div class="service-box">             
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
        </div>          
    </div> -->

    <div class="modal fade" id="seemore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#FF8000;color:#ffffff;">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
      </div>
      <div class="modal-body">
      <div class="service-box">             
        <h5 id="name">ชื่อ:</h5>
        <h5 id="nickname">ชื่อเล่น:</h5>
        <h5 id="age">วัน:</h5>
        <h5 id="gender">เวลาเริ่ม:</h5>
        <h5 id="tel">สถานที่:</h5>
        <h5 id="school">ราคา/ชั่วโมง:</h5>
        <h5 id="level">สถานะ:</h5>
        <h5 id="grade">ติดต่อ:</h5>
        <h5 id="ref_relation">รายละเอียดการสอน:</h5>
        <h5 id="ref_name">รายละเอียดการสอน:</h5>
        <h5 id="ref_tel">รายละเอียดการสอน:</h5>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn"  data-dismiss="modal">ปิดหน้าต่าง</button>
        <button type="button" class="btn " style="background-color:#FF8000;color:#ffffff;">ส่งคำขอ</button>
      </div>
    </div>
  </div>
</div>


  
    <section class="primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center"></div>
        </div>
      </div>
    </section>
    </center>

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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   

@endsection

@section('script')
  
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
      var cell5 = row.insertCell(4);
      // cell1.innerHTML = results[i].subjects_id;
      cell1.innerHTML = results[i].subject_name;
      cell2.innerHTML = results[i].level_name;
      cell3.innerHTML = results[i].day_name_full;
      cell4.innerHTML = results[i].duration_name;
      cell5.innerHTML = "<a class=\"btn btn-tutor\" style=\"font-size:12px;\" href=\"javascript:moreDetail(\'"+results[i].learner_schedule_id+"\')\">ดูรายละเอียด</a>";

     
    }

    subjectsfound.innerHTML = "<span style=\"color:#FF8000;font-weight: bold;\">"+results.length+"</span> Subjects Found";

  }


 
  function appendTag(textinput){
    var para = new Array();
    para = textinput.split("|");

    var type = para[0] ;
    var text = para[1] ;
    var id = para[2] ;


    var chkvalue = [0,0,0,0];
    var params = "";

    switch (type) {
      case "subject":
      subject_params = "";

      if(subject_tags.indexOf(id) === -1){
        subject_tags.push(id);
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'|'+text+'|'+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
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
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'|'+text+'|'+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
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
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'|'+text+'|'+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
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
        alltags.innerHTML +=   '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'|'+text+'|'+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
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
      var cell5 = row.insertCell(4);
      // cell1.innerHTML = results[i].subjects_id;
      cell1.innerHTML = results[i].subject_name;
      cell2.innerHTML = results[i].level_name;
      cell3.innerHTML = results[i].day_name_full;
      cell4.innerHTML = results[i].duration_name;
      cell5.innerHTML = "<a class=\"btn btn-tutor\" style=\"font-size:12px;\" href=\"javascript:moreDetail(\'"+results[i].learner_schedule_id+"\')\">ดูรายละเอียด</a>";

      
    }

    subjectsfound.innerHTML = "<span style=\"color:#FF8000;font-weight: bold;\">"+results.length+"</span> Subjects Found";

  }

  function detachTag(textinput){
    var para = new Array();
    para = textinput.split("|");

    var type = para[0] ;
    var text = para[1] ;
    var id = para[2] ;


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

    

    var clearText = '<span class="filtertitle">'+text+' &nbsp;	<a href="javascript:detachTag(\''+type+'|'+text+'|'+id+'\')"><i class="fa fa-times" aria-hidden="true"></i></a></span> &nbsp;';
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
      var cell5 = row.insertCell(4);
      // cell1.innerHTML = results[i].subjects_id;
      cell1.innerHTML = results[i].subject_name;
      cell2.innerHTML = results[i].level_name;
      cell3.innerHTML = results[i].day_name_full;
      cell4.innerHTML = results[i].duration_name;
      cell5.innerHTML = "<a class=\"btn btn-tutor\" style=\"font-size:12px;\" href=\"javascript:moreDetail(\'"+results[i].learner_schedule_id+"\')\">ดูรายละเอียด</a>";

    }

    subjectsfound.innerHTML = "<span style=\"color:#FF8000;font-weight: bold;\">"+results.length+"</span> Subjects Found";

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

function moreDetail(key){

// alert(key);

    xmlhttp2=new XMLHttpRequest();
    xmlhttp2.open("GET", "showdetail?id="+key, false);
    xmlhttp2.send();

    var results= JSON.parse(xmlhttp2.responseText);


    document.getElementById("name").innerHTML = "ชื่อ: "+results[0].firstname+" "+results[0].lastname ;
    document.getElementById("nickname").innerHTML = "ชื่อเล่น: "+results[0].nickname ;
    document.getElementById("age").innerHTML = "อายุ: "+results[0].age ;
    document.getElementById("gender").innerHTML = "grL: "+results[0].gender ;
    document.getElementById("tel").innerHTML = "เบอร์โทรศัพท์: "+results[0].tel ;
    document.getElementById("school").innerHTML = "โรงเรียน: "+results[0].school ;
    document.getElementById("level").innerHTML = "ระดับชั้น: "+results[0].level ;
    document.getElementById("grade").innerHTML = "เกรดเฉลี่ย: "+results[0].grade ;
    document.getElementById("ref_name").innerHTML = "ชื่อบุคคลอ้างอิง: "+results[0].ref_name ;
    document.getElementById("ref_relation").innerHTML = "ความสัมพันธ์: "+results[0].ref_relation ;
    document.getElementById("ref_tel").innerHTML = "เบอร์โทรศัพท์: "+results[0].ref_tel ;


  $('#seemore').modal('show');

}



  $(document).ready(function(){
    $('#btn-search').click(function(){
      $('#myModal').modal('show');
    })
   
  })

</script>
@endsection
