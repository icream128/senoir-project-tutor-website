@extends('layouts.tutorheader')
<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">


<style>

    .h4 h4 {
        font-size: 1.5rem;
    }


    div h5 {
        font-size:17px;
    }
    .rows {
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

    .btn-requested {
        color: #fff;
        border-color: #9fcdff;
        background-color: #79ace9;
    }

    .filtertitle {
        border: 1.2px solid #e6e6e6;
        padding: 0.2cm 0.3cm 0.2cm;
        border-radius: 5px;
    }
    .fa-times{
        color:#999999;
    }

    .dataTables_length {
        text-align: left;
    }

    .dataTables_info{
        text-align: left;
    }
    a:focus, a:hover {
        color: #000000;
    }

    
</style>
@section('content')
    <style>
        a:focus, a:hover {
            color: #0056b3;
        }
    </style>

    <br>

        <div class="col-md-12 text-center">
            <h1>ค้นหาคอร์สที่ต้องการสอน</h1>
            <center><hr class="btn-tutor"></center>
        </div>

        <div class="container">
            <div class="row">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 " style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;" >

                            <table class="table" id="showall">
                                <thead>
                                <tr style="background-color:#FF8000;color:#ffffff;">
                                    <th>วิชา</th>
                                    <th>ระดับชั้น</th>
                                    <th>วัน</th>
                                    <th>เวลา</th>
                                    <th>วันที่สร้างคอร์ส</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="body_showall">
                                    @foreach($learnerSchedule as $ls)
                                        <tr>
                                            <td> {{ $ls->subject_name }}</td>
                                            <td> {{ $ls->level_name }} </td>
                                            <td>
                                                @foreach($ls->learnerScheduleTime as $lst)
                                                    <h5 class="day_name">{{$lst->day_name}}</h5>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($ls->learnerScheduleTime as $lst)
                                                    <h5 class="time">{{date('H:i', strtotime($lst->start_time))}}น. - {{date('H:i', strtotime($lst->end_time))}}น.</h5>
                                                @endforeach
                                            </td>
                                            <th><h5>{{date('d-m', strtotime($ls->timestamp))}}-{{date('Y', strtotime($ls->timestamp))+543}}</h5></th>
                                            <?php if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 2){ ?>
                                                @if($ls->requested)
                                                    <td><center><a class="btn btn-requested" style="font-size: 13px;  width: 60px;" href="{{ url('/tutorstatusrequest') }}">ส่งคำขอแล้ว</a></center></td>
                                                @else
                                                    <td><center><a class="btn btn-tutor" style="font-size: 13px;  width: 60px;" href="javascript:moreDetail('{{ $ls->learner_schedule_id }}')">ดูรายละเอียด</a></center></td>
                                                @endif
                                            <?php } else if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 1) { ?>
                                                    <td><center><a class="btn btn-tutor" style="font-size: 13px;  width: 60px;" href="javascript:filterUser()">ดูรายละเอียด</a></center></td>
                                            <?php } else { ?>
                                                    <td><center><a class="btn btn-tutor" style="font-size: 13px;  width: 60px;" href="javascript:loginfirst()">ดูรายละเอียด</a></center></td>
                                            <?php } ?>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                    <div class="modal fade" id="seemore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#FF8000;color:#ffffff;">
                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="service-box" align="left">
                                        <h5 id="name">ชื่อ:</h5>
                                        <h5 id="nickname">ชื่อเล่น:</h5>
                                        <h5 id="subject">วิชา:</h5>
                                        <h5 id="age">วัน:</h5>
                                        <h5 id="gender">เวลาเริ่ม:</h5>
                                        <h5 id="tel">สถานที่:</h5>
                                        <h5 id="school">ราคา/ชั่วโมง:</h5>
                                        <h5 id="level">สถานะ:</h5>
                                        <h5 id="grade">ติดต่อ:</h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button onclick="send_learner_request()" type="button" class="btn" style="background-color:#FF8000;color:#ffffff;cursor: pointer">ส่งคำขอ</button>
                                    <form id="tutor-send-request-form" method="post" action="{{ url('/tutor-send-request') }}">
                                        {{ csrf_field() }}
                                        <input id="send_learner_schedule_id" type="hidden" name="learner_schedule_id" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 1)
                    <div class="modal fade" id="filterUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#FF8000;color:#ffffff;">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                </div>
                                <div class="modal-body">
                                    <h2>ข้อมูลสำหรับติวเตอร์เท่านั้น</h2>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-primary" style="font-size:17px;background-color:#FF8000;" href="{{ url('') }}/learnermycourse">ย้อนกลับ</a>
                                </div> 

                            </div>
                        </div>
                    </div>
                @else
                    <div class="modal fade" id="loginfirst" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#FF8000;color:#ffffff;">
                                    <h5 class="modal-title" id="exampleModalLabel">กรุณาเข้าสู่ระบบ</h5>
                                </div>
                                <div class="modal-body">
                                    <center>
                                    <form class="form-horizontal" method="POST" action="{{ url('/modal-login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username" class="col-md-4 control-label">บัญชีผู้ใช้</label>

                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> จำรหัสผ่าน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                            
                                                <button type="submit" class="btn btn-primary">
                                                    เข้าสู่ระบบ
                                                </button>
                                                <a class="btn" style="font-size:14px;color: #0056b3;" href="{{url('/register')}}">สมัครสมาชิก</a>
                                            </div>
                                        </div>
                                    </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <section class="primary" id="about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto text-center"></div>
                        </div>
                    </div>
                </section>
            </div></div>





@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>

    <script src="js/jquery.dataTables.js"></script>

    <script src="js/dataTables.bootstrap4.js"></script>

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
        var tableshowall = document.getElementById("body_showall");
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
                <?php if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 2){ ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:moreDetail(\'"+results[i].learner_schedule_id+"\')\">ดูรายละเอียด</a></center>";
                <?php } else if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 1) { ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:filterUser()\">ดูรายละเอียด</a></center>";
                <?php } else { ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;;\" href=\"javascript:loginfirst()\">ดูรายละเอียด</a></center>";
                <?php } ?>
            }
            subjectsfound.innerHTML = "<span style=\"color:#FF8000;font-weight: bold;\">"+results.length+"</span> รายการที่ถูกพบ";
            $("#showall").DataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ คอร์ส ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลคอร์สที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ คอร์ส",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากคอร์สทั้งหมด _MAX_ คอร์ส)",
                    "sSearch": "ค้นหา :",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sNext": "ถัดไป",
                        "sPrevious": "กลับ"
                    }
                }, 
                aaSorting: [[4, 'desc']]
            });
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
                <?php if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 2){ ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:moreDetail(\'"+results[i].learner_schedule_id+"\')\">ดูรายละเอียด</a></center>";
                <?php } else if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 1) { ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:filterUser()\">ดูรายละเอียด</a></center>";
                <?php } else { ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:loginfirst()\">ดูรายละเอียด</a></center>";
                <?php } ?>
            }
            subjectsfound.innerHTML = "<span style=\"color:#FF8000;font-weight: bold;\">"+results.length+"</span> รายการที่ถูกพบ";
            $("#showall").DataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ คอร์ส ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลคอร์สที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ คอร์ส",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากคอร์สทั้งหมด _MAX_ คอร์ส)",
                    "sSearch": "ค้นหา :",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sNext": "ถัดไป",
                        "sPrevious": "กลับ"
                    }
                }, 
                aaSorting: [[4, 'desc']]
            });
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
                <?php if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 2){ ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:moreDetail(\'"+results[i].learner_schedule_id+"\')\">ดูรายละเอียด</a></center>";
                <?php } else if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role_id == 1) { ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:filterUser()\">ดูรายละเอียด</a></center>";
                <?php } else { ?>
                    cell5.innerHTML = "<center><a class=\"btn btn-tutor\" style=\"font-size: 13px;  width: 60px;\" href=\"javascript:loginfirst()\">ดูรายละเอียด</a></center>";
                <?php } ?>
            }
            subjectsfound.innerHTML = "<span style=\"color:#FF8000;font-weight: bold;\">"+results.length+"</span> รายการที่ถูกพบ";
            $("#showall").DataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ คอร์ส ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลคอร์สที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ คอร์ส",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากคอร์สทั้งหมด _MAX_ คอร์ส)",
                    "sSearch": "ค้นหา :",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sNext": "ถัดไป",
                        "sPrevious": "กลับ"
                    }
                }, 
                aaSorting: [[4, 'desc']]
            });
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
            document.getElementById("subject").innerHTML = "วิชา: "+results[0].subject_name ;
            document.getElementById("age").innerHTML = "อายุ: "+results[0].age ;
            document.getElementById("gender").innerHTML = "เพศ: "+results[0].gender ;
            document.getElementById("tel").innerHTML = "เบอร์โทรศัพท์: "+results[0].tel ;
            document.getElementById("school").innerHTML = "โรงเรียน: "+results[0].school ;
            document.getElementById("level").innerHTML = "ระดับชั้น: "+results[0].level ;
            document.getElementById("grade").innerHTML = "เกรดเฉลี่ย: "+results[0].grade ;
            $("#send_learner_schedule_id").val(key);
            $('#seemore').modal('show');
        }

        function loginfirst(){
            $('#loginfirst').modal('show');
        }

        function filterUser(){
            $('#filterUser').modal('show');
        }

        function send_learner_request(){
            if(confirm('Are you confirm')){
                $("#tutor-send-request-form").submit();
            }
        }

        $(document).ready(function(){
            $('#btn-search').click(function(){
                $('#myModal').modal('show');
            });

            $("#showall").DataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ คอร์ส ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลคอร์สที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ คอร์ส",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากคอร์สทั้งหมด _MAX_ คอร์ส)",
                    "sSearch": "ค้นหา :",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sNext": "ถัดไป",
                        "sPrevious": "กลับ"
                    }
                },
                aaSorting: [[4, 'desc']]
            });
        });
    </script>
@endsection
