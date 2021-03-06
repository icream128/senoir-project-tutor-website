@extends('layouts.tutorheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="css/rating.css">
<link rel="stylesheet" href="css/StarRating.css">
<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<style>
    .h4 h4 {
        font-size: 1.5rem;
    }
    

    div h5 {
        font-size:17px;
    }

    .btn-tutor {
        color: #fff;
        border-color: #FF8000;
        background-color: #FF8000;
    }

    table {
        border-radius: 10px;
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #FF8000;
        color: white;
    }
    label.star {
            float: right;
            padding: 2px;
            font-size: 15px;
            color: #444;
            transition: all .2s;
        }
</style>


@section('content')
<br>
<div class="col-md-12 text-center">
        <h1>คอร์สที่กำลังสอนในขณะนี้</h1>
        <center><hr class="btn-tutor"></center>      
    </div>

   
    <!-- Table -->

    <div class="container">
      <div class="row" id="result">
        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">

            <table class="table" id="datatable-mycourse">
                <thead style="background-color:#FF8000;color:#ffffff;">
                <th><h5>ชื่อนักเรียน</h5></th>
                <th><h5>ชื่อวิชา</h5></th>
                <th><h5>ระดับชั้น</h5></th>
                <th><h5>วัน</h5></th>
                <th><h5>เวลา</h5></th>
                <th><h5>วันที่เริ่มสอน</h5></th>
                <th><h5>สถานะ</h5></th>
                <th></th>

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
                        <td><center><a class="btn btn-tutor" style="font-size:12px;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a>
                        <a class="btn btn-tutor" style="font-size:12px;" href="#" onclick="document.getElementById('data-{{$key}}').style.display='block'">การสอนแต่ละครั้ง</a></center>
                        <!-- Modal Popup   สอนแต่ละครั้ง -->
                        <div id="data-{{$key}}" class="w3-modal" >
                            <div class="w3-modal-content w3-animate-opacity" style="width: 1200px;">
                                
                                <div class="modal-header w3-container" style="background-color:#FF8000;height:30px;">
                                    <h3 style="color:#000000;margin:20px 40px; text-align: left;color: #ffffff;">การสอนแต่ละครั้ง</h3>
                                    <span onclick="document.getElementById('data-{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                        style="background-color:#FF8000;color: white;font-weight: bold;padding: 17px;width:25px;height:25px">X</span>
                                </div>

                                <center>
                                <div class="modal-body" style="width: 1100px;padding-right:45px;">
                                    <div class="row">

                                        <h5 style="text-align: left; margin-left:15px;">สอนไปแล้ว {{$value->countfre}} ครั้ง</h5>
                                        <div class="col-md-12" style="overflow-y:scroll; height:300px;">
                                            
                                            <table class="table table-striped table-bordered" style="border-color: #000000;">
                        
                                                <thead style="background-color:#FF8000;color:#ffffff;">
                                                    <th width="5%"><h5 style="font-size:17px;"></h5></th>
                                                    <th width="10%"><h5 style="font-size:17px;">วันที่เรียน</h5></th>
                                                    <th width="8%"><h5 style="font-size:17px;">เวลาเริ่ม</h5></th>
                                                    <th width="8%"><h5 style="font-size:17px;">เวลาจบ</h5></th>
                                                    <th width="7%"><h5 style="font-size:17px;">ราคา(บาท)</h5></th>
                                                    <th width="10%"><h5 style="font-size:17px;">คะแนนที่ได้</h5></th>
                                                    <th width="21%"><h5 style="font-size:17px;">ความคิดเห็น</h5></th>
                                                    <th width="21%"><h5 style="font-size:17px;">การสอนในรอบหน้า</h5></th>
                                                    <th width="10%"><h5 style="font-size:17px;">นัดรอบหน้า</h5></th>
                                                </thead> 
                        
                                                <tbody>
                                                    @if($value->countfre == 0)
                                                        <tr><td colspan="12" style="text-align: center">ไม่มีประวัติการสอน</td></tr>
                                                    @else
                                                        @foreach($value->frequency as $data =>$val)
                                                        <tr class="data-table">
                                                            <td><h5 class="sort" style="text-align: center;">{{$data+1}}</h5></td>
                                                            <td><h5 class="level_name">{{date('d-m', strtotime($val->create_frequency))}}-{{date('Y', strtotime($val->create_frequency))+543}}</h5></td>
                                                            <td><h5 class="day_name">{{$val->start_time}}</h5></td>
                                                            <td><h5 class="duration_name">{{$val->end_time}}</h5></td>
                                                            <td><h5 class="price" style="text-align: right;">{{$val->price}}</h5></td>
                                                            <td>
                                                                <x-star-rating style="pointer-events: none;" value="{{$val->point}}" number="5"></x-star-rating>
                                                            </td>
                                                            <td><h5 class="comment">{{$val->comment}}</h5></td>
                                                            <td><h5 class="moredetail">{{$val->moredetail}}</h5></td>
                                                            <td><h5 class="nextdeal">{{date('d-m', strtotime($val->nextdeal))}}-{{date('Y', strtotime($val->nextdeal))+543}}</h5></td>
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                        
                                        </div>
                                    </div>
                                </div>
                                </center>
                                <div class="modal-footer"></div>
                            </div>
                        </div> 
                    </td>
                    
                    </tr>  
                    
                        <!-- Modal Popup -->
                        <div id="{{$key}}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity">
                            <header class="w3-container" style="background-color:#ffffff;">
                                <h3 style="color:#000000;margin:20px 40px">ข้อมูลติวเตอร์</h3>
                                <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                    style="background-color:#FF8000;color: white;font-weight: bold">X</span>
                            </header>
                                <div class="w3-container">
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-8 text-center" style="padding-bottom=10px;">
                                                <div class="service-box">
                                                    <div class="container">
                                                        <a href="/learnershortprofile&<?php echo $value->user_id_request ?>"><img src="{{$value->img_profile}}" class="img-circle img-responsive"
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
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>เรียนเรื่อง :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->detail_lesson}}&nbsp</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>วันที่ตกลงคอร์ส :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{date('d-m', strtotime($value->datetime))}}-{{date('Y', strtotime($value->datetime))+543}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>วันที่เริ่มเรียน :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{date('d-m', strtotime($value->start_course))}}-{{date('Y', strtotime($value->start_course))+543}}</h5>
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
                                                            <h5>ข้อมูลสถานที่ :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->detail_location}}&nbsp</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>การเดินทาง :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->detail_transport}}&nbsp</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-8 text-right">
                                                            <h5>ราคา/ชั่วโมง :</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5>{{$value->price}}</h5>
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
                                            <div class="col-md-12" style="text-align: center; padding-top:20px;">
                                                <a class="btn btn-info" style="cursor: pointer;background-color: red;width: 100px;" href="{{url('/cancelcourse&'.$value->agreement_id)}}">ยกเลิกคอร์ส</a>
                                                <a class="btn btn-primary" style="cursor: pointer;background-color: green;width: 100px;" href="{{url('/endcourse&'.$value->agreement_id)}}">จบคอร์ส</a>
                                                <!-- <button class="btn btn-info" type="button"
                                                        style="cursor: pointer;background-color: red;width: 100px" onclick="course_canceled({{$value->learner_schedule_id}})">ยกเลิกคอร์ส</button>
                                                <button class="btn btn-primary" type="button" style="cursor: pointer;background-color: green;width: 100px" onclick="course_success({{$value->learner_schedule_id}})">จบคอร์ส</button> -->
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

            @endsection

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
    
    <script src="js/StarRating.js"></script>

    <script>
        $(document).ready(function(){
            $('#datatable-mycourse').DataTable({
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
                aaSorting: [[5, 'asc']]
            });
        });
    </script>

@endsection
