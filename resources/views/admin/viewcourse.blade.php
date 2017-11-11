@extends('layouts.adminheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/rating.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="css/StarRating.css">
<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@section('content')

    <style>
        div h5 {
            font-size:17px;
        }

        label.star {
            float: right;
            padding: 2px;
            font-size: 15px;
            color: #444;
            transition: all .2s;
        }

        .page-item.active .page-link {
            z-index: 2;
            color: #fff;
            background-color: #f05f40;
            border-color: #f05f40;
        }
        
    </style>

    <br>
    <div class="col-md-12 text-center">
        <h1>รายละเอียดคอร์สเรียน</h1>
        <center><hr></center>      
    </div>

    <!-- Table -->
    <div class="container">
        <div class="row" id="result">
            <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">

                <table class="table" id="datatable-mycourse">
                    <thead style="background-color:#f05f40;color:#ffffff;">
                        <th><h5>id</h5></th>
                        <th><h5>รายวิชา</h5></th>
                        <th><h5>นักเรียน</h5></th>
                        <th><h5>ติวเตอร์</h5></th>
                        <th><h5>สถานะ</h5></th>
                        <th><h5></h5></th>
                    </thead>

                    <tbody id="data-table-block">
                    @foreach($courseDetail as $key =>$value)
                        <tr class="data-table">
                            <td><h5 class="user_name">{{$value->learner_schedule_id}}</h5></td>
                            <td><h5 class="user_name">{{$value->subject_name}}</h5></td>
                            <td><h5 class="count" style="margin-right: 20px;">{{$value->firstname}}&nbsp&nbsp{{$value->lastname}}</h5></td>
                            <td>
                                @foreach($value->tutor as $lst)
                                    <h5 class="count" style="margin-right: 20px;">{{$lst->firstname}}&nbsp&nbsp{{$lst->lastname}}</h5>
                                @endforeach
                            </td>
                            <td><h5 class="user_name">{{$value->status_name}}</h5></td>
                            <td><center><a class="btn" style="font-size:12px;background-color:#FF0000;color: white" href="#" onclick="document.getElementById('data-{{$key}}').style.display='block'">ตรวจสอบ</a></center>
                            <!-- Modal Popup   สอนแต่ละครั้ง -->
                            <div id="data-{{$key}}" class="w3-modal" >
                                <div class="w3-modal-content w3-animate-opacity" style="width: 1100px;">
                                    
                                    <header class="w3-container" style="background-color:#ffffff;">
                                        <h3 style="color:#000000;margin:20px 40px">การสอนแต่ละครั้ง</h3>
                                        <span onclick="document.getElementById('data-{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                            style="background-color:#f05f40;color: white;font-weight: bold">X</span>
                                    </header>

                                    <center>
                                    <div class="modal-body" style="width: 1000px;padding-right:45px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered" style="border-color: #000000;">
                            
                                                    <thead style="background-color:#f05f40;color:#ffffff;">
                                                        <th><h5 style="font-size:17px;">วันที่เรียน</h5></th>
                                                        <th><h5 style="font-size:17px;">เวลาเริ่ม</h5></th>
                                                        <th><h5 style="font-size:17px;">เวลาจบ</h5></th>
                                                        <th><h5 style="font-size:17px;">ค่าสอน</h5></th>
                                                        <th><h5 style="font-size:17px;">คำวิจารณ์</h5></th>
                                                        <th><h5 style="font-size:17px;">รายละเอียดในครั้งต่อไป</h5></th>
                                                        <th><h5 style="font-size:17px;">วันที่เรียนครั้งหน้า</h5></th>
                                                        <th><h5 style="font-size:17px;">คะแนนที่ได้</h5></th>
                                                    </thead> 

                                                    <tbody>
                                                        @if($value->countfre == 0)
                                                            <tr><td colspan="12" style="text-align: center">ไม่มีประวัติการสอน</td></tr>
                                                        @else
                                                            @foreach($value->frequency as $data =>$val)
                                                            <tr class="data-table">
                                                                <td><h5 class="level_name">{{date('d-m', strtotime($val->create_frequency))}}-{{date('Y', strtotime($val->create_frequency))+543}}</h5></td>
                                                                <td><h5 class="day_name">{{$val->start_time}}</h5></td>
                                                                <td><h5 class="duration_name">{{$val->end_time}}</h5></td>
                                                                <td><h5 class="level_name">{{$val->price}}</h5></td>
                                                                <td><h5 class="level_name">{{$val->comment}}</h5></td>
                                                                <td><h5 class="level_name">{{$val->moredetail}}</h5></td>
                                                                <td><h5 class="level_name">{{date('d-m', strtotime($val->nextdeal))}}-{{date('Y', strtotime($val->nextdeal))+543}}</h5></td>
                                                                <td>
                                                                    <x-star-rating value="{{$val->point}}" number="5"></x-star-rating>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                            
                                            </div>
                                        </div>
                                    </div>
                                    </center>
                            
                                </div>
                            </div>
                        </td>

                            <!-- Modal Popup -->
                            <div id="{{$key}}" class="w3-modal">
                                <div class="w3-modal-content w3-animate-opacity" style="width: 500px">
                                    <header class="w3-container" style="background-color:#ffffff;">
                                        <h5 style="color:#000000;margin:20px 40px">คุณต้องการลบผู้ใช้ท่านนี้นี้ใช่ไหม?</h5>
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
                                                        <a class="btn btn-primary" style="font-size:15px;background-color:green;font-weight: normal" href="">ยืนยัน</a>&nbsp&nbsp
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody> 
                </table> 

                <form id="course_success_form" action="{{ url('/learner-course-success') }}" method="post">
                    {{ csrf_field() }}
                    <input id="course_success_id" type="hidden" name="learner_schedule_id" value="">
                </form>

                <form id="course_canceled_form" action="{{ url('/learner-course-canceled') }}" method="post">
                    {{ csrf_field() }}
                    <input id="course_canceled_id" type="hidden" name="learner_schedule_id" value="">
                </form>

            </div>
        </div>
    </div>
                        
    <br><br>
@endsection
@section('script')

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="js/jquery.dataTables.js"></script>

    <script src="js/dataTables.bootstrap4.js"></script>

    <script src="js/creative.min.js"></script>

    <script src="js/StarRating.js"></script>


    <script>

        function course_success(key){
            $("#course_success_id").val(key);
            $("#course_success_form").submit();
        }

        function course_canceled(key){
            $("#course_canceled_id").val(key);
            $("#course_canceled_form").submit();
        }

    </script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#datatable-mycourse').dataTable( {
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ คอร์ส/หน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลคอร์สที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ คอร์ส",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 คอร์ส",
                    "sInfoFiltered": "(จากคอร์สทั้งหมด _MAX_ คอร์ส)",
                    "sSearch": "ค้นหา :",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sNext": "ถัดไป",
                        "sPrevious": "กลับ"
                    }
                }, 
            } );
        } );
    </script>

@endsection
