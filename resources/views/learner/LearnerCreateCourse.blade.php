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
    <section class="text-center">
        <h1>สร้างคอร์สเรียน</h1>
        <center><hr></center>
    </section>

    <div class="container">
        <div class="row" id="result">

            <form action="{{url('/learnersavecourse')}}" method="post">
                {{ csrf_field() }}

                <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-center">
                            <div class="container">
                                <div class="row">

                                    <div class="  col-md-6 text-center">
                                        <div class="service-box">

                                            <h3>วิชา</h3>
                                            <select name="subject" class="form-control pad1">
                                                <?php
                                                foreach($subject as $key =>$value){
                                                    echo '<option value="'.$value->subject_id.'">'.$value->subject_name.'</option>' ;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="  col-md-6 text-center">
                                        <div class="service-box">

                                            <h3>ระดับชั้น</h3>
                                            <select name="level" class="form-control pad1">
                                                <?php
                                                foreach($level as $key =>$value){
                                                    echo '<option value="'.$value->level_id.'">'.$value->level_name.'</option>' ;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="  col-md-12 text-center">
                                        <div class="service-box">

                                            <h3>รายละเอียดสถานที่</h3>
                                            <input type="text" placeholder="ระบุสถานที่" name="location" class="form-control pad1">
                                                
                                        </div>
                                    </div>

                                    <div class="  col-md-12 text-center">
                                        <div class="service-box">

                                            <h3>ราคา</h3>

                                            <div class="col-md-0">
                                                    <div class="row">
                                                        <div class="col-md-8 text-center">
                                                            <input type="text" placeholder="ราคาต่อชั่วโมง" name="price_per_hour" class="form-control pad1">
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

                            <!-- ul -->
                            <div class="col-md-6 text-center">
                            <div id="time_container" class="container time_container">
                                <div class="row" id="addtime">

                                    <!-- li -->
                                    <div class="col-md-12 text-center">
                                        <div class="container">
                                            <div class="row">

                                                <div class="col-md-4 text-center">
                                                    <div class="service-box">

                                                        <h3>วัน</h3>
                                                        <select id="select_day" name="day[]" class="form-control pad1">
                                                            <?php
                                                            foreach($day as $key =>$value){
                                                                echo '<option value="'.$value->day_id.'">'.$value->day_name.'</option>' ;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{--<div class="col-md-6">--}}
                                                    {{--<div class="service-box">--}}
                                                        {{--<h3>เวลาเริ่ม - เวลาจบ</h3>--}}
                                                        {{--<p class="basicExample row" style="margin-left:10px">--}}
                                                            {{--<input type="text" class="date start" />--}}
                                                            {{--<input type="text" class="col-md-5 time start form-control" />--}}
                                                            {{--<span class="col-md-1"></span>--}}
                                                            {{--<input type="text" class="col-md-5 time end form-control" />--}}
                                                            {{--<input type="text" class="form-control time start" /> to--}}
                                                            {{--<input type="text" class="form-control time end" />--}}
                                                            {{--<input type="text" class="date end" />--}}
                                                        {{--</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="col-md-3 text-center">
                                                    <div class="service-box">

                                                        <h3>เวลาเริ่ม</h3>
                                                        <input id="select_starttime" type="time" name="start_time[]" class="form-control pad1">
                                                    </div>
                                                </div>

                                                <div class="col-md-3 text-center">
                                                    <div class="service-box">

                                                        <h3>เวลาจบ</h3>
                                                        <input type="time" id="select_endtime" name="end_time[]" class="form-control pad1">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 text-center" id="close_btn_place" style="padding-top: 53px"></div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                            <div class="col-md-6 text-center"></div>
                            <div class="col-md-6 text-center" style="margin-top:20px;">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-12 text-center">
                                        <div class="container">
                                            <div class="row">

                                                <div class="col-md-5 text-center"></div>
                                                <div class="col-md-5 text-center">
                                                    <button type="button" class="btn btn-primary btn-xl js-scroll-trigger" onclick="myFunction()" style="font-size:15px;color:#ffffff;font-weight:normal;margin-bottom:20px;">เพิ่มเวลา</button>
                                                </div>
                                                <div class="col-md-2 text-center"></div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                            <!-- <div class="container">
                          <div class="row">
                          <div class="col-lg-3 col-md-3 text-center">
                              <div class="service-box">
                                <h3>ตำบล/แขวง</h3>
                                <input type="text" id="district" class="form-control">
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-3 text-center">
                              <div class="service-box">
                                <h3>อำเภอ/เขต</h3>
                                <input type="text" id="amphoe" class="form-control">
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-3 text-center">
                              <div class="service-box">
                                <h3>จังหวัด</h3>
                                <input type="text" id="province" class="form-control">
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-3 text-center">
                              <div class="service-box">
                                <h3>รหัสไปรษณีย์</h3>
                                <input type="text" id="zipcode" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div> -->

                        <div class="container text-center" style="margin-top:25px;margin-bottom:10px">
                            <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">สร้างคอร์สเรียน</button>
                        </div>

                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="/js/timepicker/jquery.timepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="/js/timepicker/bootstrap-datepicker.min.css" />
    <script type="text/javascript" src="{{ url('/js/timepicker/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/timepicker/jquery.timepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/timepicker/datepair.js') }}"></script>
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
            $('.basicExample .time').timepicker({
                'showDuration': true,
                'timeFormat': 'g:ia'
            });
        }
        function noDis(x){
            $("#addtime"+x).remove();
        }
    </script>
    <script>
        // initialize input widgets first
        $('.basicExample .time').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia'
        });

//                $('#basicExample .date').datepicker({
//                    'format': 'm/d/yyyy',
//                    'autoclose': true
//                });

        // initialize datepair
//        var basicExampleEl = document.getElementById('basicExample');
//        var datepair = new Datepair(basicExampleEl);
    </script>

@endsection
