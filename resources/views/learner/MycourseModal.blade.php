<link rel="stylesheet" href="css/StarRating.css">
<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@foreach($agreement as $key =>$value)
                        <div class="w3-container">
                            <div class="container">
                                <div class="row">        
                                    <div class="col-lg-4 col-md-8 text-center" style="padding-bottom=10px;">
                                        <div class="service-box">              
                                            <div class="container">   
                                                <a href="/tutorshortprofile&<?php echo $value->user_id_request ?>"><img src="{{$value->img_profile}}" class="img-circle img-responsive" 
                                                style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="150" height="150"></a>
                                            </div>
                                            <x-star-rating value="{{$avg}}" number="5"></x-star-rating>
                                        </div>
                                    </div>
                                    <br>        
                                    <div class="col-lg-2 col-md-8 text-right">
                                        <div class="service-box">             
                                            <h5>ชื่อ :</h5>
                                            <h5>วิชา :</h5>
                                            <h5>วันที่ตกลงคอร์ส :</h5>
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
                                            <h5>ราคา/ชั่วโมง :</h5>
                                            <h5>สถานะ :</h5>
                                            <h5>ติดต่อ :</h5>
                                            <h5>รายละเอียดการสอน :</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">
                                        <div class="service-box">              
                                            <h5>{{$value->firstname}} {{$value->lastname}}</h5>
                                            <h5>{{$value->subject_name}}</h5>
                                            <h5>{{date('d m', strtotime($value->datetime))}}&nbsp{{date('Y', strtotime($value->datetime))+543}}</h5>
                                            <h5>&nbsp</h5>
                                            @foreach($value->learnerScheduleTime as $lst)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h5 class="day_name">{{$lst->day_name}}</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="time">{{date('H:i', strtotime($value->start_time))}}น. - {{date('H:i', strtotime($value->end_time))}}น.</h5>
                                                    </div>
                                                    
                                                </div>
                                            @endforeach
                                            <h5>&nbsp</h5>
                                            <h5>{{$value->location}}</h5>
                                            <h5>{{$value->price}}</h5>
                                            <h5>{{$value->status_name}}</h5>
                                            <h5>{{$value->tel}}</h5>    
                                            <h5>-</h5><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary"  href="/learnercommentcancel&<?php echo $value->user_id_request ?>&<?php echo $value->learner_schedule_id ?>&<?php echo $value->agreement_id ?>"  style="background-color:#f05f40;color:#ffffff;">ยกเลิกคอร์ส</a>
                            <a class="btn btn-primary"  href="/learnercommentend&<?php echo $value->user_id_request ?>&<?php echo $value->learner_schedule_id ?>&<?php echo $value->agreement_id ?>"  style="background-color:green;color:#ffffff;">คอร์สเสร็จสิ้น</a>
                        </div> 
                        @endforeach
                        <script src="js/StarRating.js"></script>