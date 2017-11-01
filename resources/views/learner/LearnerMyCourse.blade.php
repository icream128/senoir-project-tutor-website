@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/rating.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">
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
    </style>

    <br>
    <div class="col-md-12 text-center">
        <h1>คอร์สที่กำลังเรียนในขณะนี้</h1>
        <center><hr></center>      
    </div>

    <!-- Table -->
    <div class="container">
        <div class="row" id="result">
            <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">

                <table class="table" id="datatable-mycourse">
                    <thead style="background-color:#f05f40;color:#ffffff;">
                        <th><h5>ชื่อติวเตอร์</h5></th>
                        <th><h5>ชื่อวิชา</h5></th>
                        <th><h5>ระดับชั้น</h5></th>
                        <th><h5>วัน</h5></th>
                        <th><h5>เวลาเรียน</h5></th>
                        <th><h5>วันที่เริ่มเรียน</h5></th>
                        <th><h5>สถานะ</h5></th>
                        <th><h5></h5></th>
                    </thead>

                    <tbody id="data-table-block">
                    @foreach($agreement as $key =>$value)
                        <tr class="data-table">
                            <td><h5 class="tutor_name">{{$value->firstname}} {{$value->lastname}}</h5></td>
                            <td><h5 class="subject_name">{{$value->subject_name}}</h5></td>
                            <td><h5 class="level_name">{{$value->level_name}}</h5></td>
                            <td>
                                @foreach($value->learnerScheduleTime as $lst)
                                    <h5 class="day_name">{{$lst->day_name}}</h5>
                                @endforeach
                            </td> 
                            <td>
                                @foreach($value->learnerScheduleTime as $lst)
                                    <h5 class="time">{{date('H:i', strtotime($lst->start_time))}}-{{date('H:i', strtotime($lst->end_time))}}</h5>

                                @endforeach
                            </td>
                            <td><h5>{{date('d-m', strtotime($value->start_course))}}-{{date('Y', strtotime($value->start_course))+543}}</h5></td>
                            <td><h5 class="status_name">{{$value->status_name}}</h5></td>
                            <td><center><a class="btn btn-primary" style="font-size:12px;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a>
                            <a class="btn btn-primary" style="font-size:12px;" href="#" onclick="document.getElementById('data-{{$key}}').style.display='block'">การเรียนแต่ละครั้ง</a></center></td>
                            
                            <!-- Modal Popup -->
                            <div id="{{$key}}" class="w3-modal">
                                <div class="w3-modal-content w3-animate-opacity">
                                <header class="w3-container" style="background-color:#ffffff;">
                                    <h3 style="color:#000000;margin:20px 40px">ข้อมูลติวเตอร์</h3>
                                    <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                        style="background-color:#f05f40;color: white;font-weight: bold">X</span>
                                </header>
                                    <div class="w3-container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-8 text-center" style="padding-bottom=10px;">
                                                    <div class="service-box">
                                                        <div class="container">
                                                            <a href="/tutorshortprofile&<?php echo $value->tutor_id ?>"><img src="{{$value->img_profile}}" class="img-circle img-responsive"
                                                                                                                                    style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="150" height="150"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-lg-3 col-md-8 text-right">
                                                    <div class="service-box">
                                                        <h5>ชื่อ :</h5>
                                                        <h5>วิชา :</h5>
                                                        <h5>เรียนเรื่อง :</h5>
                                                        <h5>วันที่ตกลงคอร์ส :</h5>
                                                        <h5>วันที่เริ่มเรียน :</h5>
                                                        <h5>&nbsp</h5>
                                                        <h5>วัน / เวลาเรียน :</h5>
                                                        @foreach($value->learnerScheduleTime as $lst)
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h5>&nbsp</h5>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5>&nbsp</h5>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <h5>สถานที่ :</h5>
                                                        <h5>ข้อมูลสถานที่ :</h5>
                                                        <h5>การเดินทาง :</h5>
                                                        <h5>ราคา/ชั่วโมง :</h5>
                                                        <h5>สถานะ :</h5>
                                                        <h5>ติดต่อ :</h5>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-md-6 text-left" style="padding-left: 0px;">
                                                    <div class="service-box">
                                                        <h5>{{$value->firstname}} {{$value->lastname}}&nbsp</h5>
                                                        <h5>{{$value->subject_name}}</h5>
                                                        <h5>{{$value->detail_lesson}}&nbsp</h5>
                                                        <h5>{{date('d-m', strtotime($value->datetime))}}-{{date('Y', strtotime($value->datetime))+543}}</h5>
                                                        <h5>{{date('d-m', strtotime($value->start_course))}}-{{date('Y', strtotime($value->start_course))+543}}</h5>
                                                        <h5>&nbsp</h5>
                                                        @foreach($value->learnerScheduleTime as $lst)
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <h5 class="day_name">{{$lst->day_name}}</h5>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5 class="time">{{date('H:i', strtotime($lst->start_time))}}น. - {{date('H:i', strtotime($lst->end_time))}}น.</h5>
                                                                </div>

                                                            </div>
                                                        @endforeach
                                                        <h5>&nbsp</h5>
                                                        <h5>{{ $value->location }}</h5>
                                                        <h5>{{$value->detail_location}}&nbsp</h5>
                                                        <h5>{{$value->detail_transport}}&nbsp</h5>
                                                        <h5>{{$value->price}}</h5>
                                                        <h5>{{$value->status_name}}</h5>
                                                        <h5>{{$value->tel}}</h5><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: center">
                                                    <button class="btn btn-info" type="button"
                                                            style="cursor: pointer;background-color: red;width: 100px" onclick="course_canceled({{$value->learner_schedule_id}})">ยกเลิกคอร์ส</button>
                                                    <button class="btn btn-primary" type="button" style="cursor: pointer;background-color: green;width: 100px" onclick="course_success({{$value->learner_schedule_id}})">จบคอร์ส</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
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

    <!-- Modal Popup   สอนแต่ละครั้ง -->
    <div id="data-{{$key}}" class="w3-modal" >
        <div class="w3-modal-content w3-animate-opacity" style="width: 1100px;">

            <header class="w3-container" style="background-color:#ffffff;">
                <h3 style="color:#000000;margin:20px 40px">การสอนแต่ละครั้ง</h3>
                <span onclick="document.getElementById('data-{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                    style="background-color:#f05f40;color: white;font-weight: bold">X</span>
                </header>

            <center>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" style="border-color: #000000;">
    
                            <thead style="background-color:#f05f40;color:#ffffff;">
                                <th><h5>วันที่เรียน</h5></th>
                                <th><h5>เวลาเริ่ม</h5></th>
                                <th><h5>เวลาจบ</h5></th>
                                <th><h5>ค่าสอน</h5></th>
                                <th><h5>คำวิจารณ์</h5></th>
                                <th><h5>รายละเอียดเพิ่มเติมในครั้งต่อไป</h5></th>
                                <th><h5>วันที่เรียนครั้งหน้า</h5></th>
                                <th><h5>คะแนนที่ได้</h5></th>
                            </thead> 
    
                            <tbody>
                                @foreach($agr[$value->agreement_id] as $data =>$val)
                                <tr class="data-table">
                                    <td><h5 class="level_name">{{$val->study_date}}</h5></td>
                                    <td><h5 class="day_name">{{$val->start_time}}</h5></td>
                                    <td><h5 class="duration_name">{{$val->end_time}}</h5></td>
                                    <td><h5 class="level_name">{{$val->price}}</h5></td>
                                    <td><h5 class="level_name">{{$val->comment}}</h5></td>
                                    <td><h5 class="level_name">{{$val->moredetail}}</h5></td>
                                    <td><h5 class="level_name">{{$val->nextdeal}}</h5></td>
                                    <td>
                                        <div class="stars">
                                            <input class="star star-5" id="{{ $data}}star-5" type="radio" name="{{ $data}}star" {{ $val->point == 5 ? "checked" : "" }} value="5"/>
                                            <label class="star star-5" for="{{ $data}}star-5"></label>
                                            <input class="star star-4" id="{{ $data}}star-4" type="radio" name="{{ $data}}star" {{ $val->point == 4 ? "checked" : "" }} value="4"/>
                                            <label class="star star-4" for="{{ $data}}star-4"></label>
                                            <input class="star star-3" id="{{ $data}}star-3" type="radio" name="{{ $data}}star" {{ $val->point == 3 ? "checked" : "" }} value="3"/>
                                            <label class="star star-3" for="{{ $data}}star-3"></label>
                                            <input class="star star-2" id="{{ $data}}star-2" type="radio" name="{{ $data}}star" {{ $val->point == 2 ? "checked" : "" }} value="2"/>
                                            <label class="star star-2" for="{{ $data}}star-2"></label>
                                            <input class="star star-1" id="{{ $data}}star-1" type="radio" name="{{ $data}}star" {{ $val->point == 1 ? "checked" : "" }} value="1"/>
                                            <label class="star star-1" for="{{ $data}}star-1"></label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
            </center>
            
            <div class="modal-footer">
                <a class="btn btn-primary btn-l js-scroll-trigger"style="font-size: 15px;" href="{{url('/classbegin&'.$value->agreement_id)}}">เรียน</a>
                <a class="btn btn-primary btn-l js-scroll-trigger" style="font-size: 15px;" href="{{url('/cancelcourse&'.$value->agreement_id)}}">ยกเลิกคอร์ส</a>
                <a class="btn btn-primary btn-l js-scroll-trigger" style="font-size: 15px;" href="{{url('/endcourse&'.$value->agreement_id)}}">จบคอร์ส</a>
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
                    "sLengthMenu": "แสดง _MENU_ คอร์สต่อหน้า",
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
                aaSorting: [[5, 'asc']]
            } );
        } );
    </script>

@endsection
