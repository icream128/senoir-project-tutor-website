@extends('layouts.learnerheader')

@section('content')
    <style>
        .closebtn {
            margin-top: 53px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        div h5 {
            font-size:17px;
        }

        .pad{
            padding-bottom:15px;
        }

        .pad1{
            padding: 5px;
        }
    </style>
    <br>
    <div class="col-md-12 text-center">
        <h1>แก้ไขรายละเอียด</h1>
        <center><hr></center>
    </div>

    <div class="container">
        <div class="row" id="result">
            <form method='post' action="{{ url('') }}/updateeditcourse&{{ $learnerSchedule->learner_schedule_id }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <div class="container">
                        <div class="row">

                            <div class="  col-md-6">
                                <div class="service-box">

                                    <h3>วิชา</h3>
                                    <select id="subject" name="subject" class="form-control pad1">
                                        <?php
                                        foreach($subject as $key =>$value){
                                            echo '<option value="'.$value->subject_id.'">'.$value->subject_name.'</option>' ;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="  col-md-6">
                                <div class="service-box">

                                    <h3>ระดับชั้น</h3>
                                    <select id="level" name="level" class="form-control pad1">
                                        <?php
                                        foreach($level as $key =>$value){
                                            echo '<option value="'.$value->level_id.'">'.$value->level_name.'</option>' ;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="  col-md-12">
                                <div class="service-box">

                                    <h3>รายละเอียดสถานที่</h3>
                                    <input type="text" placeholder="ระบุสถานที่" name="location" class="form-control pad1" value="{{ $learnerSchedule->location }}">
                                        
                                </div>
                            </div>

                            <div class="  col-md-12">
                                <div class="service-box">

                                    <h3>ราคา</h3>

                                    <div class="col-md-0">
                                            <div class="row">
                                                <div class="col-md-8 text-center">
                                                    <input type="number" step="50" style="text-align: right" placeholder="ราคาต่อชั่วโมง" name="price_per_hour" class="form-control pad1" value="{{ $learnerSchedule->price_per_hour }}">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="container">
                                                        <div class="row">
                                                            <h5 style="margin-top: 6px;">บาท/ชั่วโมง</h5>                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                        
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>

                    <div class="col-md-6  text-center">
                        <div>
                            <div class="row">
                                <!-- li -->
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <div class="service-box" style="text-align: left">
                                                    <h3>วัน</h3>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <div class="service-box" style="text-align: left">
                                                    <h3>เวลาเริ่ม</h3>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <div class="service-box" style="text-align: left">
                                                    <h3>เวลาจบ</h3>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center" style="padding-top: 53px"></div>
                                        </div>
                                    </div>
                                </div>

                                <div id="time_container" class="container time_container">
                                    @foreach($learnerScheduleTime as $lst)
                                    <div class="row" id="addtime">
                                        <!-- li -->
                                        <div class="col-md-12"  >
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4 text-center">
                                                        <div style="margin-bottom: 15px">
                                                            <select id="select_day" name="day[]" class="form-control pad1">
                                                                <?php
                                                                foreach($day as $key =>$value){
                                                                    $selected = $value->day_id == $lst->day_id ? "selected":"";
                                                                    echo '<option value="'.$value->day_id.'" '. $selected .'>'.$value->day_name.'</option>' ;
                                                                }
                                                                ?>
                                                            </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 text-center">
                                                                <div >
                                                                    <input id="select_starttime" type="time" name="start_time[]" value="{{ $lst->start_time }}" class="form-control pad1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 text-center">
                                                                <div >
                                                                    <input type="time" id="select_endtime" name="end_time[]" value="{{ $lst->end_time }}" class="form-control pad1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 text-center closebtn" id="close_btn_place" style="margin-top: -5px"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>

                                        <div class="col-md-11">
                                            <button type="button" class="btn js-scroll-trigger" onclick="myFunction()" style="font-size:15px;color:#ffffff;font-weight:normal;margin-bottom:20px;background-color: #0D8BBD;cursor: pointer">เพิ่มเวลา</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="container text-center" style="margin-top:25px;margin-bottom:10px">
                    <button type="button" class="btn btn-l" style="background-color: #778899;color: white;font-weight:normal;" onclick="resetTime()">ล้างข้อมูลเวลา</button>
                    <button class="btn btn-primary btn-l js-scroll-trigger" type="submit" style="width: 80px;font-weight:normal;">ยืนยัน</button>
                </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>

@endsection
@section('script')

    <script src="vendor/jquery/jquery.min.js"></script>

    <script>
        var count = 1;
        function myFunction() {
            var addtime = $("#addtime").clone().attr('id','addtime'+count).appendTo('.time_container');
            var close = document.createElement("SPAN");
            close.setAttribute("id", "close" + count);
            close.setAttribute("class", "closebtn col-md-2 text-center");
            close.setAttribute("onclick", "noDis('"+count+"')");
            $("#addtime"+count+" #close_btn_place").append(close);


            document.getElementById("close" + count).innerHTML = "&times";
            count++;
        }
        function noDis(x){
            $("#addtime"+x).remove();
        }

        function resetTime(){
            var addtime_row = $("#addtime").clone();
            $("#time_container").html('');
            $("#time_container").append(addtime_row);
        }

        $(document).ready(function(){
            $("#level").val({{ $learnerSchedule->level_id }});
            $("#subject").val({{ $learnerSchedule->subject_id}});
        })
    </script>

@endsection
