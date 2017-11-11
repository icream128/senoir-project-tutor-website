@extends('layouts.adminheader')

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

        .page-item.active .page-link {
            z-index: 2;
            color: #fff;
            background-color: #f05f40;
            border-color: #f05f40;
        }
        
    </style>

    <br>
    <div class="col-md-12 text-center">
        <h1>รายละเอียดผู้ใช้งาน</h1>
        <center><hr></center>      
    </div>

    <!-- Table -->
    <div class="container">
        <div class="row" id="result">
            <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">

                <table class="table" id="datatable-mycourse">
                    <thead style="background-color:#f05f40;color:#ffffff;">
                        <th><h5>ชื่อผู้ใช้งาน</h5></th>
                        <th><h5>ประเภท</h5></th>
                        <th><h5>ทำการเรียนการสอนไป</h5></th>
                        <th><h5>คะแนนรวม</h5></th>
                        <th><h5>สถานะ</h5></th>
                        <th><h5></h5></th>
                    </thead>

                    <tbody id="data-table-block">
                    @foreach($userProfile as $key =>$value)
                        <tr class="data-table">
                            <td><h5 class="user_name">{{$value->firstname}} {{$value->lastname}}</h5></td>
                            <td><h5 class="user_name">{{$value->role_name}}</h5></td>
                            <td><h5 class="count" style="text-align: right;margin-right: 20px;">{{$value->countrate}} &nbspครั้ง</h5></td>
                            <td>
                                <div class="stars">
                                    <input class="star star-5" id="{{ $key}}star-5" type="radio" name="{{ $key}}star" {{ $value->frequency == 5 ? "checked" : "" }} value="5"/>
                                    <label class="star star-5" for="{{ $key}}star-5"></label>
                                    <input class="star star-4" id="{{ $key}}star-4" type="radio" name="{{ $key}}star" {{ $value->frequency == 4 ? "checked" : "" }} value="4"/>
                                    <label class="star star-4" for="{{ $key}}star-4"></label>
                                    <input class="star star-3" id="{{ $key}}star-3" type="radio" name="{{ $key}}star" {{ $value->frequency == 3 ? "checked" : "" }} value="3"/>
                                    <label class="star star-3" for="{{ $key}}star-3"></label>
                                    <input class="star star-2" id="{{ $key}}star-2" type="radio" name="{{ $key}}star" {{ $value->frequency == 2 ? "checked" : "" }} value="2"/>
                                    <label class="star star-2" for="{{ $key}}star-2"></label>
                                    <input class="star star-1" id="{{ $key}}star-1" type="radio" name="{{ $key}}star" {{ $value->frequency == 1 ? "checked" : "" }} value="1"/>
                                    <label class="star star-1" for="{{ $key}}star-1"></label>
                                </div>
                                <h5 class="day_name">{{$value->frequency}}</h5>
                            </td>
                            <td><h5 class="user_name">{{$value->status_name}}</h5></td>
                            <td><center><a class="btn" style="font-size:12px;background-color:#FF0000;color: white" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ระงับบัญชีผู้ใช้</a>
                            <a class="btn" style="font-size:12px;background-color: green;color: white" href="#" onclick="document.getElementById('data{{$key}}').style.display='block'">ถอนการระงับ</a></center></td>

                            <!-- Modal Popup -->
                            <div id="{{$key}}" class="w3-modal">
                                <div class="w3-modal-content w3-animate-opacity" style="width: 500px">
                                    <header class="w3-container" style="background-color:#ffffff;">
                                        <h5 style="color:#000000;margin:20px 40px">คุณต้องการระงับผู้ใช้ท่านนี้ใช่ไหม?</h5>
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
                                                        <a class="btn btn-primary" style="font-size:15px;background-color:green;font-weight: normal" href="{{ url('') }}/updatestop&<?php echo $value->user_id ?>">ยืนยัน</a>&nbsp&nbsp
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!-- Modal Popup -->
                            <div id="data{{$key}}" class="w3-modal">
                                <div class="w3-modal-content w3-animate-opacity" style="width: 500px">
                                    <header class="w3-container" style="background-color:#ffffff;">
                                        <h5 style="color:#000000;margin:20px 40px">คุณต้องการถอนการระงับผู้ใช้ท่านนี้ใช่ไหม?</h5>
                                        <span onclick="document.getElementById('data{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                            style="background-color:#f05f40;color: white;font-weight: bold">X</span>
                                    </header>
                                    <br>
                                    <div class="w3-container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-8 text-center" style="padding-bottom=10px;">
                                                    <center>
                                                        <a class="btn btn-primary" style="font-size:15px;background-color:#FF0000;font-weight: normal" onclick="document.getElementById('data{{$key}}').style.display='none'" href="#">ยกเลิก</a>
                                                        <a class="btn btn-primary" style="font-size:15px;background-color:green;font-weight: normal" href="{{ url('') }}/updatepass&<?php echo $value->user_id ?>">ยืนยัน</a>&nbsp&nbsp
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
                    "sLengthMenu": "แสดง _MENU_ คน/หน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลผู้ใช้งานที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ ผู้ใช้งาน",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 ผู้ใช้งาน",
                    "sInfoFiltered": "(จากผู้ใช้งานทั้งหมด _MAX_ คน)",
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
