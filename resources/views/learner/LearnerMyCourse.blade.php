@extends('layouts.learnerheader')

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
                     <?php
                        $count=1
                      
                     ?>
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
                            <a class="btn btn-primary" style="font-size:12px;" href="#" onclick="document.getElementById('data-{{$key}}').style.display='block'">การเรียนแต่ละครั้ง</a></center>
                            <!-- Modal Popup   สอนแต่ละครั้ง -->
                            <div id="data-{{$key}}" class="w3-modal" >
                                <div class="w3-modal-content w3-animate-opacity" style="width: 1200px;">
                                    
                                    <div class="modal-header w3-container" style="background-color:#f05f40;height:30px;">
                                        <h3 style="color:#000000;margin:20px 40px; text-align: left;color: #ffffff;">การเรียนแต่ละครั้ง</h3>
                                        <span onclick="document.getElementById('data-{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
                                            style="background-color:#f05f40;color: white;font-weight: bold;padding: 17px;width:25px;height:25px">X</span>
                                    </div>

                                    <center>
                                    <div class="modal-body" style="width: 1100px;padding-right:45px;">
                                        <div class="row">
                                            
                                            <h5 style="text-align: left; margin-left:15px;">เรียนไปแล้ว {{$value->countfre}} ครั้ง</h5>
                                            <div class="col-md-12" style="overflow-y:scroll; height:300px;">
                                                
                                                <table class="table table-striped table-bordered" style="border-color: #000000;">
                            
                                                    <thead style="background-color:#f05f40;color:#ffffff;">
                                                        <th width="5%"><h5 style="font-size:17px;"></h5></th>
                                                        <th width="12%"><h5 style="font-size:17px;">วันที่เรียน</h5></th>
                                                        <th width="8%"><h5 style="font-size:17px;">เวลาเริ่ม</h5></th>
                                                        <th width="8%"><h5 style="font-size:17px;">เวลาจบ</h5></th>
                                                        <th width="7%"><h5 style="font-size:17px;">ราคา(บาท)</h5></th>
                                                        <th width="7%"><h5 style="font-size:17px;">คะแนนที่ได้</h5></th>
                                                        <th width="19%"><h5 style="font-size:17px;">ความคิดเห็น</h5></th>
                                                        <th width="19%"><h5 style="font-size:17px;">การสอนในรอบหน้า</h5></th>
                                                        <th width="12%"><h5 style="font-size:17px;">นัดรอบหน้า</h5></th>
                                                        <th width="3%"><h5 style="font-size:17px;"></h5></th>
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
                                                                @if($data+1 == $value->countfre)
                                                                    <td><a class="btn btn-primary" style="font-size:12px;" href="/editdealnextcourse&<?php echo $val->frequency_id ?>">แก้ไขเวลานัด</a></td>
                                                                @else
                                                                    <td><h5 class="edit"></h5></td>
                                                                @endif
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
                            </div> </td>
                        
                        </tr>  
                        
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
                                                                    @foreach($value->checkDate as $fr)
                                                                        <?php
                                                                            $nextdeal = $fr->nextdeal;
                                                                            $date = DateTime::createFromFormat("Y-m-d", $nextdeal);
                                                                            $day = $date->format("d");
                                                                            $month = $date->format("m");
                                                                            $year = $date->format("Y");
                                                                            echo "<input type='hidden' id='d".$count."' value='".$day."'></input>";
                                                                            echo "<input type='hidden' id='m".$count."' value='".$month."'></input>";
                                                                            echo "<input type='hidden' id='y".$count."' value='".$year."'></input>";
                                                                        ?>
                                                                    @endforeach
                                                                    <div class="row" >
                                                                        <div class="col-md-4">
                                                                            <h5 class="day_name">{{$lst->day_name}}</h5>
                                                                            <?php echo "<input type='hidden' id='day".$count."' value='".$lst->day_name."'></input>";?>
                                                                            <?php echo "<input type='hidden' id='day".$count."' value='".$lst->learner_schedule_time_id."'></input>";?>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <h5 class="time">{{date('H:i', strtotime($lst->start_time))}}น. - {{date('H:i', strtotime($lst->end_time))}}น.</h5>
                                                                        </div>

                                                                        <div class="col-md-2" style="margin-top:-6px;">
                                                                            <?php echo "<p id='btn".$count."'></p>";?>
                                                                        </div>
                                                                        <?php echo "<script> var i = ".$count."</script>"; $count++;?>
                                                                        <script>
                                                                            var d = new Date();
                                                                            var n = d.getDay();
                                                                            var gd = d.getDate();
                                                                            var gm = d.getMonth()+1;
                                                                            var gy = d.getYear()+1900;

                                                                            var day = document.getElementById("day"+i).value;
                                                                            var d = document.getElementById("d"+i).value;
                                                                            var m = document.getElementById("m"+i).value;
                                                                            var y = document.getElementById("y"+i).value;

                                                                            if(day=='วันอาทิตย์' && n==0 && gd==d && gm==m && gy==y){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }if(day=='วันจันทร์' && n==1 && gd==d && gm==m && gy==y){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }if(day=='วันอังคาร' && n==2 && gd==d && gm==m && gy==y){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }if(day=='วันพุธ' && n==3 && gd==d && gm==m && gy==y){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }if(day=='วันพฤหัสบดี' && n==4 && gd==d && gm==m && gy==y){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }if(day=='วันศุกร์' && n==5 && gd==d && gm==m && gy==y){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }if(day=='วันเสาร์' && n==6 && gd==d && gm==m && gy==y){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }if(day=='ทุกวัน'){
                                                                                document.getElementById("btn"+i).innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เรียน</a>";
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                @endforeach
                                                                <div name="firstLearn" class="col-md-6">
                                                                    <a class='btn btn-primary btn-l js-scroll-trigger'id='{{$key}}firstStudy' style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id.'&'.$lst->learner_schedule_time_id)}}'>เริ่มเรียนครั้งแรก</a>
                                                                </div>
                                                                <script>
                                                                    var status = '{{$value->status_id}}';
                                                                    if(status == 3){
                                                                        document.getElementById("{{$key}}firstStudy").style.display = "block";
                                                                    }else{
                                                                        document.getElementById("{{$key}}firstStudy").style.display = "none";
                                                                    }
                                                                </script>
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
                                                    style="cursor: pointer;background-color: red;width: 100px" onclick="course_canceled({{$value->learner_schedule_id}})">ยกเลิกคอร์ส</button> -->
                                                    <!-- <button class="btn btn-primary" type="button" style="cursor: pointer;background-color: green;width: 100px" onclick="course_success({{$value->learner_schedule_id}})">จบคอร์ส</button> -->
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
        function checkTime(i) {
            var d = new Date();
            var n = d.getDay();

            var day1 = document.getElementById("day1").value;
            var day2 = document.getElementById("day2").value;
            alert(day1);
            alert(day2);

            if(day == 'วันอาทิตย์'){
                document.getElementById("btn").innerHTML = "<a class='btn btn-primary btn-l js-scroll-trigger'style='font-size: 15px;' href='{{url('/classbegin&'.$value->agreement_id)}}'>เรียน</a>";
            }
        }
    </script>

    <script>
        $("#rate").click( function(){
            return false;
        });
    </script>
    <script>
function myFunction() {
    document.getElementById("myText").readOnly = true;
}


</script>


    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#datatable-mycourse').dataTable( {
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ คอร์สต่อหน้า",
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
                aaSorting: [[5, 'asc']]
            } );
        } );
    </script>

@endsection
