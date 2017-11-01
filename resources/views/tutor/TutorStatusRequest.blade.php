@extends('layouts.tutorheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <link rel="stylesheet" href="css/paginationtutor.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">

@section('content')

<style>
    .h4 h4 {
        font-size: 1.5rem;
    }


    div h5 {
        font-size:16px;
    }
    .btn-tutor {
        color: #fff;
        border-color: #FF8000;
        background-color: #FF8000;
    }
    .btn-approved {
        color:  mediumseagreen;
        font-weight: bold;

    }
    .btn-other-approved {
        color: indianred;
        font-weight: bold;
    }
</style>

    <br><br><br><br><br>

    <div class="col-md-12 text-center">
        <h1>สถานะคอร์สที่ส่งคำขอ</h1>
        <center><hr class="btn-tutor"> </center>
    </div>


    <!-- Table -->
    <div class="container">
        <div class="row" id="result">
            <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">

                <table class="table" id="datatable-statusrequest">
                    <thead style="background-color:#FF8000;color:#ffffff;">
                    <th><h5>ชื่อนักเรียน</h5></th>
                    <th><h5>ชื่อวิชา</h5></th>
                    <th><h5>ระดับชั้น</h5></th>
                    <th><h5>วัน</h5></th>
                    <th><h5>เวลา</h5></th>
                    <th><h5>วันที่ส่งคำขอ</h5></th>
                    <th><h5>สถานะคำขอ</h5></th>

                    </thead>

                    <tbody id="data-table-block">
                    @foreach($learnerSchedule as $key =>$value)
                        <tr class="data-table">
                            <td><h5 class="name">{{$value->firstname}} {{$value->lastname}}</h5></td>
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
                            <td><h5>{{date('d-m', strtotime($value->timestamp))}}-{{date('Y', strtotime($value->timestamp))+543}}</h5></td>
                            @if($value->approved_tutor == 0)
                                <td><center><h5 class="btn" style="cursor: pointer;font-weight:normal;background-color:#778899;color: #ffffff;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">รอการตอบรับ</h5></center></td>
                            @elseif($value->approved_tutor == 1)
                                <td><center><h5 class="btn-approved" href="{{ url('') }}/tutormycourse">คำขอถูกอนุมัติ</h5></center></td>
                            @else
                                <td><center><h5 class="btn-other-approved"  href="#">คำขอถูกปฏิเสธ</h5></center></td>
                        @endif
                        </tr>

                        <!-- Modal Popup -->
                        <div id="{{$key}}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity">
                                <header class="w3-container" style="background-color:#ffffff;">
                                    <h3 style="color:#000000;margin:20px 40px">ข้อมูลนักเรียน</h3>
                                    <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                          style="background-color:#FF8000;color: white;font-weight: bold">X</span>
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
                                            <div class="col-lg-8 col-md-8">
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>ชื่อ :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->firstname}} {{$value->lastname}}&nbsp</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>วิชา :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->subject_name}}</h5>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>&nbsp</h5>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>วัน / เวลาเรียน :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>&nbsp</h5>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>สถานที่ :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{ $value->location }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                                
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>ราคา/ชั่วโมง :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->price_per_hour}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>สถานะ :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->status_name}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>ติดต่อ :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->tel}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
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

            </div>
        </div>
    </div>

@section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>


    <script src="js/jquery.dataTables.js"></script>

    <script src="js/dataTables.bootstrap4.js"></script>

    <script src="js/creative.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#datatable-statusrequest').DataTable({
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
                aaSorting: [[5, 'desc']]
            });
        });
    </script>

@endsection



