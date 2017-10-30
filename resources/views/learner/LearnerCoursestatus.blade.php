@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" href="js/Datatables-1.10.15/media/css/dataTables.bootstrap4.css">
@section('content')
    <style>
        .h4 h4 {
            font-size: 1.5rem;
        }
        
    
        div h5 {
            font-size:17px;
        }
        

    </style>
    <br>
    
    <section class="text-center">   
        <h1>สถานะคอร์สที่ฉันสร้าง</h1>
        <center><hr></center>      
    </section>

    <!-- Table -->
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
         
            <table class="table" id="datatable-coursestatus">
                <thead style="background-color:#f05f40;color:#ffffff;">
                    <th><h4>ชื่อวิชา</h4></th>
                    <th><h4>ระดับชั้น</h4></th>
                    <th><h4>วัน</h4></th>
                    <th><h4>เวลา</h4></th>
                    <th><h4></h4></th>
                    
                
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
                        <td><center><a class="btn btn-primary" style="font-size:12px;background-color:#778899;width:80px;" href="{{ url('') }}/learnereditcourse&<?php echo $value->learner_schedule_id ?>">แก้ไขรายละเอียด</a>&nbsp;&nbsp;
                                @if($value->requested == 0)
                                    <button class="btn btn-primary" onclick="checkingTutorRequest({{ $value->learner_schedule_id }})" style="font-size:12px;background-color:limegreen;cursor:pointer;width:80px;">ได้รับคำขอ </button>
                                @else
                                    <button class="btn btn-primary" onclick="checkingTutorRequest({{ $value->learner_schedule_id }})" style="font-size:12px;background-color:#FFA500;cursor:pointer;width:80px;">ตรวจสอบคำขอ </button>
                                @endif
                        <a class="btn btn-primary" style="font-size:12px;background-color:#FF0000;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ลบคอร์สเรียน</a></center></td>
                    </tr>
                    <!-- Modal Popup -->
                    <div id="{{$key}}" class="w3-modal">
                        <div class="w3-modal-content w3-animate-opacity">
                            <header class="w3-container" style="background-color:#ffffff;">
                                <h3 style="color:#000000;margin:20px 40px">คุณต้องการลบคอร์สเรียนนี้ใช่ไหม?</h3>
                                <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright" style="background-color:#f05f40;">&times;</span>
                            </header>
                            <br><br>  
                            <div class="w3-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-8 text-center" style="padding-bottom=10px;">
                                            <center>
                                                <a class="btn btn-primary" style="font-size:20px;background-color:green;" href="{{ url('') }}/deletecourse&<?php echo $value->learner_schedule_id ?>">ใช่! ฉันต้องการ</a>&nbsp&nbsp
                                                <a class="btn btn-primary" style="font-size:20px;background-color:#FF0000;" onclick="document.getElementById('{{$key}}').style.display='none'" href="#">ไม่ใช่! ฉันกดผิด</a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>  
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

    <script src="{{url('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{ url('/js/Datatables-1.10.15/media/js/jquery.dataTables.js') }}"></script>

    <script src="{{ url('/js/Datatables-1.10.15/media/js/dataTables.bootstrap4.js') }}"></script>

    <script src="{{ url('/js/creative.min.js') }}"></script>

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
                            '<td><center><a href="{{ url('') }}/learnerdeal&'+ v.learner_schedule_request_id +'"><button class="btn btn-info">รายละเอียด</button></a></center></td>'+
                            '</tr>')
                    });
                    if(data.length == 0){
                        $("#checking_tutor_list").append('<tr><td colspan="6" style="text-align: center">ไม่มีการส่งคำขอจากติวเตอร์</td></tr>')
                    }
                    console.log(data);
                },
                dataType: 'json'
            });
        }

        $(document).ready(function(){
            $('#datatable-coursestatus').DataTable();
        });
    </script>




@endsection