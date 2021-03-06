@extends('layouts.learnerheader')

@section('content')
    <style>
        p {
            font-size:18px;
        }
        div h5 {
            font-size:15px;
        }

        .pad{
            padding-bottom:15px;
        }

        div label {
            font-size: 20px;
        }

    </style>

    <link href="css/stepconfirm.css" rel="stylesheet">
    <center>
        <!-- MultiStep Form -->
        <div class="row">
            <div class="col-md-12">
                <form id="msform" action="{{ url('/createagreement')}}" method='post' enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" style="font-size: 14px;color:black;">ข้อมูลผู้ส่งคำร้อง</li>
                                <li style="font-size: 14px;color:black;">เพิ่มรายละเอียดคอร์ส</li>
                            </ul>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                    <!-- fieldsets -->
                    <fieldset  style="background-color:#D8D8D8;padding:20px;border-radius:25px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img border="0" class="img-circle img-responsive infinite pulse" src="{{ url('').'/'.$learnerScheduleRequest[0]->img_profile }}"
                                         style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px;margin-bottom:10px" width="300px" height="300px">
                                    <br><br>
                                </div>

                                <div class="col-md-4 text-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 text-right">
                                                <br>
                                                <p>ชื่อ :</p>
                                                <p>ชื่อเล่น :</p>
                                                <p>เพศ :</p>
                                                <p>ระดับชั้น :</p>
                                                <p>สถานศึกษา :</p>
                                                <p>ประสบการณ์สอน :</p>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <br>
                                                <p>{{ $learnerScheduleRequest[0]->firstname." ".$learnerScheduleRequest[0]->lastname }}</p>
                                                <p>{{ $learnerScheduleRequest[0]->nickname }}</p>
                                                <p>{{ $learnerScheduleRequest[0]->gender }}</p>
                                                <p>{{ $learnerScheduleRequest[0]->level }}</p>
                                                <p>{{ $learnerScheduleRequest[0]->school }}</p>
                                                <p>{{ $learnerScheduleRequest[0]->experience }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 text-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 text-right">
                                                <br>
                                                <p>&nbsp</p>
                                                <p>อายุ :</p>
                                                <p>&nbsp</p>
                                                <p>เกรดเฉลี่ย :</p>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <br>
                                                <p>&nbsp</p>
                                                <p>{{ $learnerScheduleRequest[0]->age }}</p>
                                                <p>&nbsp</p>
                                                <p>{{ $learnerScheduleRequest[0]->grade }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/learnercoursestatus')}}"><input type="button" name="next" style="background:gray;font-size: 16px;font-weight: normal;width: 100px;font-family: 'Athiti', sans-serif" class="action-button" value="ย้อนกลับ" onclick = ""/></a>
                        <input type="button" name="next" style="background:green;font-size: 16px;font-weight: normal;width: 100px;font-family: 'Athiti', sans-serif"  class="next action-button" value="ยอมรับ" onclick = ""/>
                    </fieldset>
                    <!-- Part 3 -->
                    <fieldset  style="background-color:#D8D8D8;padding:20px;border-radius:25px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12"  style="background-color:#D8D8D8;border-radius:25px;padding:10px;">
                                    <div class="container">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="learner_schedule_request_id" value="{{ $learnerScheduleRequest[0]->learner_schedule_request_id }}">
                                        <div class="row" style="text-align: left">

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดบทเรียน</label>
                                                <textarea placeholder="รายละเอียดบทเรียน" rows="4" cols="50" name="detail_lesson" class="form-control" style="border-radius:10px;"></textarea>
                                            </div>

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดสถานที่</label>
                                                <textarea placeholder="รายละเอียดสถานที่" rows="4" cols="50" name="detail_location" class="form-control" style="border-radius:10px;"></textarea>
                                            </div>

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดการเดินทาง</label>
                                                <textarea placeholder="รายละเอียดการเดินทาง" rows="4" cols="50" name="detail_transport" class="form-control" style="border-radius:10px;"></textarea>
                                            </div>

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label class="fontsize">วันที่เริ่มเรียน</label>
                                                <input type="date" name="startdate" class="form-control" style="border-radius:10px;"/>
                                            </div>



                                        </div>
                                        <!-- End Time Zone -->
                                        <button id="submit_btn" type="submit" class="submit action-button text-center" style="font-weight: normal;width: 100px">ยืนยัน</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <!-- END Part 3 -->
                </form>
            </div>
        </div>
        <!-- /.MultiStep Form -->
    </center>

    <br>
    <br>
    <br>




@endsection

@section('script')

    <script type="text/javascript" src="{{url('/js/stepconfirm1.js')}}"></script>

    <script>
        function diff(start, end) {
            //console.log(end);
            start = start.split(":");
            end = end.split(":");
            var startDate = new Date(0, 0, 0, start[0], start[1], 0);
            var endDate = new Date(0, 0, 0, end[0], end[1], 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);
            var time = hours+':'+minutes;
            if(!isNaN(hours)){
                $('input[name="time"]').val(time)
                var price = $('input[name="price"]').val();
                var total = (hours*price)+((price/60)*minutes);
                $('input[name="total"]').val(total)
            }

            // console.log(hours+':'+minutes)
            console.log(time)
            //console.log(hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes;
        }
        $(document).ready(function(){
            $('input[name="start_time"]').change(function(){
                diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())

            });
            $('input[name="end_time"]').change(function(){
                diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())

            });
            $('input[name="price"]').keyup(function(){
                diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
            })

            $("#submit_btn").on('click',function(){
                $("#msform").submit();
            })
        })
    </script>

@endsection

