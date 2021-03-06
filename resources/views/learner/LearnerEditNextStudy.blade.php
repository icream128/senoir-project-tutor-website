@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/rating.css">
@section('content')
    <style>

       h5 {
            font-size:17px;
        }
        
    </style>
    <br>
    
    <div class="col-md-12 text-center">
        <h1>แก้ไขรายละเอียดการเรียนครั้งถัดไป</h1>
        <center><hr></center>      
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            @foreach($frequency as $key =>$value)
            <div class="col-md-10">
                <form action="/saveeditnextcourse&<?php echo $value->frequency_id ?>" method='post' enctype="multipart/form-data">    
                    {{ csrf_field() }}
                    
                    <div class="col-md-12"  style="background-color:#D8D8D8;border-radius:25px;padding:10px;">
                        
                        <div class="container">
                            
                            <div class="row">
                                <input type="hidden" name="agreement" >
                                <div class="col-md-4" style="margin-top:10px;">
                                    <label>ราคาต่อชั่วโมง</label>
                                    <input placeholder="ราคาต่อชั่วโมง" name="price"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->price_per_hour}}" readonly="readonly"/>
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <label>เวลาที่เริ่ม</label>
                                    <input type="time" name="start_time" class="form-control" style="border-radius:10px;" value="{{$value->start_time}}" readonly="readonly"/>   
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <label>เวลาที่จบ</label>
                                    <input type="time" name="end_time" class="form-control" style="border-radius:10px;" value="{{$value->end_time}}" readonly="readonly"/>   
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4" style="margin-top:10px;">
                                    <input type="text" placeholder="จำนวนชั่วโมง" name="result"  class="form-control" style="border-radius:10px;" readonly="readonly"/> 
                                </div>
                                <div class="col-md-2" style="margin-top:20px;">
                                    <h4 style="font-size: 17px;padding-top: 8px;">ชั่วโมง</h4>
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <input type="text" placeholder="จำนวนเงิน" name="total"  class="form-control" style="border-radius:10px;" readonly="readonly"/>
                                </div>
                                <div class="col-md-2" style="margin-top:20px;">
                                    <h4 style="font-size: 17px;padding-top: 8px;">บาท</h4>
                                </div>
                                <div class="col-md-12" style="padding-top: 30px">
                                    <label>ให้คะแนนติวเตอร์</label>
                                </div>
                                <div class="col-md-12 text-center">
                                <div class="stars">
                                    <input class="star star-5" id="{{ $key}}star-5" type="radio" name="{{ $key}}star" data-waschecked="true" {{ $value->point == 5 ? "checked" : "" }} value="5"/>
                                    <label class="star star-5" for="{{ $key}}star-5"></label>
                                    <input class="star star-4" id="{{ $key}}star-4" type="radio" name="{{ $key}}star" {{ $value->point == 4 ? "checked" : "" }} value="4"/>
                                    <label class="star star-4" for="{{ $key}}star-4"></label>
                                    <input class="star star-3" id="{{ $key}}star-3" type="radio" name="{{ $key}}star" {{ $value->point == 3 ? "checked" : "" }} value="3"/>
                                    <label class="star star-3" for="{{ $key}}star-3"></label>
                                    <input class="star star-2" id="{{ $key}}star-2" type="radio" name="{{ $key}}star" {{ $value->point == 2 ? "checked" : "" }} value="2"/>
                                    <label class="star star-2" for="{{ $key}}star-2"></label>
                                    <input class="star star-1" id="{{ $key}}star-1" type="radio" name="{{ $key}}star" {{ $value->point == 1 ? "checked" : "" }} value="1"/>
                                    <label class="star star-1" for="{{ $key}}star-1"></label>
                                </div>
                                </div>

                                <div class="col-md-6" style="margin-top:20px;">
                                    <label>รายละเอียดครั้งถัดไป</label>
                                    <textarea placeholder="รายละเอียดเพิ่มเติม" rows="4" cols="50" name="moredetail" class="form-control"
                                        style="border-radius:10px;">{{$value->moredetail}}</textarea>
                                </div>

                                <div class="col-md-6" style="margin-top:20px;">
                                    <label>วิจารณ์เกี่ยวกับการสอน</label>
                                    <textarea placeholder="วิจารณ์เกี่ยวกับการสอน" rows="4" cols="50" name="comment" class="form-control"
                                        style="border-radius:10px;" readonly="readonly">{{$value->comment}}</textarea>
                                </div>

                                <div class="col-md-6" style="margin-top:20px;">
                                    <label class="fontsize">วันนัดหมายครั้งต่อไป</label>
                                    <input type="date" name="nextdeal" class="form-control" style="border-radius:10px;" value="{{$value->nextdeal}}"/>
                                </div>

                            </div>

                        </div>

                        <div class="text-center col-md-12" style="padding-top: 20px">
                            <button class="btn btn-primary btn-xl js-scroll-trigger" id="btn-save" type="button" style="font-size: 17px;">ยอมรับ</button>
                        </div>
                        
                    <div>
                </form>  
            </div>
            @endforeach
            <div class="col-md-1"></div>
        </div>
        <br><br>
    </div>
    
    
@endsection
@section('script')
    <script>
    
        function diff(start, end) {
            //console.log(end);
            start = start.split(":");
            end = end.split(":");
            var startDate = new Date(0, 0, 0, start[0], start[1], start[2]);
            var endDate = new Date(0, 0, 0, end[0], end[1], end[2]);
            var diff = endDate.getTime() - startDate.getTime();
        // alert(diff/1000);
            var price = $('input[name="price"]').val();
            price = (price/60)/60;
            $('input[name="total"]').val(price*(diff/1000));
            
            var date = new Date(null);
            date.setSeconds(diff/1000); // specify value for SECONDS here
            var result = date.toISOString().substr(11, 8);
            $('input[name="result"]').val(result);
            // console.log(hours+':'+minutes)
            console.log(time)
            //console.log(hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes;
        }
        $(document).ready(function(){
            diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
        })
                $(document).ready(function(){
                    $('#btn-save').click(function(){
                        swal({
                title: "บันทึก?",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('form').submit();
                    } 
                });
                    })
                })
    </script>

    <script>
        $(":radio").click( function(){
            return false;
        });
    </script>
@endsection