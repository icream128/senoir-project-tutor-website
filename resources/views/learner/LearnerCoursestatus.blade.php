@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">
@section('content')
    <style>

       h5 {
            font-size:17px;
        }


    </style>
    <br>
    
    <div class="col-md-12 text-center">
        <h1>สถานะคอร์สที่ฉันสร้าง</h1>
        <center><hr></center>      
    </div>

    <!-- Table -->
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
         
            <table class="table" id="datatable-coursestatus">
                <thead style="background-color:#f05f40;color:#ffffff;">
                    <th><h5>ชื่อวิชา</h5></th>
                    <th><h5>ระดับชั้น</h5></th>
                    <th><h5>วัน</h5></th>
                    <th><h5>เวลา</h5></th>
                    <th><h5>วันที่สร้างคอร์ส</h5></th>
                    <th><h5></h5></th>
                    
                
                </thead>

                <tbody id="data-table-block">
                @foreach($learnerSchedule as $key =>$value)
                    <tr class="data-table">
                        <td><h5 class="subject_name">{{$value->subject_name}}</h5></td>
                        <td><h5 class="level_name">{{$value->level_name}}</h5></td>
                        <td>
                        @foreach($value->learnerScheduleTime as $lst)
                            <h5 class="day_name">{{$lst->day_name}}</h5>
                        @endforeach
                        </td>
                        <td>
                        @foreach($value->learnerScheduleTime as $lst)
                            <h5 class="time">{{date('H:i', strtotime($lst->start_time))}}น. - {{date('H:i', strtotime($lst->end_time))}}น.</h5>
                        @endforeach
                        </td>
                        <th><h5>{{date('d-m', strtotime($value->timestamp))}}-{{date('Y', strtotime($value->timestamp))+543}}</h5></th>
                        <td><center><a class="btn"
                                       style="font-size:12px;background-color:#778899;color: white;width: 75px" href="{{ url('') }}/learnereditcourse&<?php echo $value->learner_schedule_id ?>">แก้ไขข้อมูล</a>&nbsp;&nbsp;
                                @if($value->requested == 0)
                                    <button class="btn" onclick="checkingTutorRequest({{ $value->learner_schedule_id }})"
                                            style="font-size:12px;background-color:limegreen;cursor:pointer;width: 75px;color: white">มีคนส่งคำขอมา</button>
                                @else
                                    <button class="btn" onclick="checkingTutorRequest({{ $value->learner_schedule_id }})"
                                            style="font-size:12px;background-color:#FFA500;cursor:pointer;width: 75px;color: white">ตรวจสอบคำขอ</button>
                                @endif
                        <a class="btn" style="font-size:12px;background-color:#FF0000;color: white" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ลบคอร์ส</a></center></td>
                    </tr>
                    <!-- Modal Popup -->
                    <div id="{{$key}}" class="w3-modal">
                        <div class="w3-modal-content w3-animate-opacity" style="width: 500px">
                            <header class="w3-container" style="background-color:#ffffff;">
                                <h5 style="color:#000000;margin:20px 40px">คุณต้องการลบคอร์สเรียนนี้ใช่ไหม?</h5>
                                <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                      style="background-color:#f05f40;color: white;font-weight: bold">X</span>
                            </header>
                            <br>
                            <div class="w3-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-8 text-center" style="padding-bottom=10px;">
                                            <center>
                                                <a class="btn btn-primary" style="font-size:15px;background-color:#FF0000;font-weight: normal" onclick="document.getElementById('{{$key}}').style.display='none'" href="#">ยกเลิก</a>
                                                <a class="btn btn-primary" style="font-size:15px;background-color:green;font-weight: normal" href="{{ url('') }}/deletecourse&<?php echo $value->learner_schedule_id ?>">ยืนยัน</a>&nbsp&nbsp
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                @endforeach
                </tbody>            
            </table>
            <div class="modal fade" id="tutor-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#f05f40;color:#ffffff;">
                            <h5 class="modal-title" id="exampleModalLabel">รายชื่อติวเตอร์ที่ส่งคำขอ</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <th>ชื่อติวเตอร์</th>
                                        <th>เพศ</th>
                                        <th>อายุ</th>
                                        <th>สถาบัน</th>
                                        <th>เกรดเฉลี่ยสะสม</th>
                                        <th></th>
                                        </thead>
                                        <tbody id="checking_tutor_list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" style="background-color:#f05f40;color:#ffffff;cursor: pointer" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>
    <br><br>
@endsection

@section('script')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="js/jquery.dataTables.js"></script>

    <script src="js/dataTables.bootstrap4.js"></script>

    <script src="js/creative.min.js"></script>

    <script>

        function checkingTutorRequest(key){
            $("#tutor-request").modal('show');
            $.ajax({
                type: "POST",
                url: '{{ url('') }}/checking-tutor-request',
                data: {'_token':'{{ csrf_token() }}','learner_schedule_id':key},
                success: function(data){
                    $("#checking_tutor_list").html('');
                    $.each(data,function(k,v){
                        $("#checking_tutor_list").append('<tr>' +
                            '<td>'+ v.firstname + ' ' + v.lastname +'</td>' +
                            '<td>'+ v.gender +'</td>'+
                            '<td>'+ v.age +'</td>'+
                            '<td>'+ v.school +'</td>'+
                            '<td>'+ v.grade +'</td>'+
                            '<td><center><a href="{{ url('') }}/learnerdeal&'+ v.learner_schedule_request_id +'"><button class="btn btn-primary" style="font-size:12px;">ดูรายละเอียด</button></a></center></td>'+
                            '</tr>')
                    });
                    if(data.length == 0){
                        $("#checking_tutor_list").append('<tr><td colspan="6" style="text-align: center">ไม่มีคำขอจากติวเตอร์</td></tr>')
                    }
                    console.log(data);
                },
                dataType: 'json'
            });
        }
    </script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#datatable-coursestatus').dataTable( {
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
            } );
        } );
    </script>

@endsection