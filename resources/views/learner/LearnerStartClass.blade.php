@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



@section('content')
<style>
    div h5 {
        font-size:15px;
    }

    .navbar-hight{
        higth:50px;
    }

    .pad{
        padding-bottom:15px;
    }
    
    div label {
        font-size: 20px;
    }
    .btn-primary.disabled, .btn-primary:disabled {
        background-color:#778899;
        border-color: #778899;
    }

</style>

    <section id="services" class="text-center">   
        <h1>เริ่มการเรียนการสอน</h1>
        <center><hr></center>      
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            
            <div class="col-md-10">
            
            <div class="container">
                    <div class="row"> 
                  
                        <div class="col-md-12"  style="background-color:#D8D8D8;border-radius:25px;padding-bottom:20px;">
                            
                            <center>
                            <div class="col-md-12" style="padding-top:50px;">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-6" id="showRemain" style="font-size:25px;">
                                            <h4>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                        </div>
                                        
                                        <div class="col-md-6" id="over_time" style="font-size:25px;">
                                            <h4>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                                
                            
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-6" style="padding-top:50px;">
                                        <button class="btn btn-primary btn-xl js-scroll-trigger" id="start_button" type="button" onclick="countDown();" style="font-size: 17px;">เริ่มเรียน</button>   
                                        <h4 id="start_time"></h4>
                                    </div>
                                                
                                    <div class="col-md-6" style="padding-top:50px;">
                                        <button class="btn btn-primary btn-xl js-scroll-trigger" id="end_button" type="button" style="font-size: 17px ;" onclick="stop();">เรียนเสร็จ</button>
                                        <h4 id="end_time"></h4>
                                    </div>
                                </div>
                            </div>
                            <br><br>

                            <form method="post" action="{{url('/dealnextcourse')}}">
                            {{ csrf_field() }}
                                <input type="hidden" name="start_time" value="">
                                <input type="hidden" name="end_time" value="">
                                <input type="hidden" name="agreement" value="{{$frequency->agreement_id}}">
                                <button class="btn btn-primary btn-xl js-scroll-trigger" id="submit" type="submit" style="font-size: 17px ;display:none;" onclick="submit();">ตกลง</button>
                            </form>

                            </center>
                        </div>
                       
                    </div>
                   
                </div>
               

            </div>
            
            
            <div class="col-md-1"></div>
        </div>
    </div>

        

    <!-- Plugin JavaScript -->
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    

@endsection
@section('script')
<script type="text/javascript">
$('.over_time').hide();
var countdown;
var check = 0;
function countDown(){
    check = 1;
    start = '{{$frequency->start_time}}';
    end = '{{$frequency->end_time}}';
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();

    now = new Date();
    hour = "" + now.getHours(); 
    if (hour.length == 1) { 
        hour = "0" + hour; 
    }    
    minute = "" + now.getMinutes(); 
    if (minute.length == 1) { 
        minute = "0" + minute; 
    }    
    second = "" + now.getSeconds(); 
       if (second.length == 1) { 
        second = "0" + second; 
     }    
     
    var start_time = " " + hour + ":" + minute + ":" + second;  
    $('#start_time').html(start_time);
    $('input[name = "start_time"]').val(start_time);
    $('#start_button').attr('disabled','disabled');

    

    
//     var hours = Math.floor(diff / 1000 / 60 / 60);
//     diff = hours  * 60 * 60;
//     var minutes = Math.floor(diff / 1000 / 60);
//     var time = hours;
//   alert(diff);

    var t = new Date();
    t.setSeconds(t.getSeconds() + 10);

    Date.prototype.addSeconds= function(s){
        this.setSeconds(this.getSeconds()+s);
        return this;
    }
    var xx = new Date().addSeconds(diff/1000);
    //alert(xx);
    countdown = setInterval(function(){ 
        var timeA = new Date(); // วันเวลาปัจจุบัน
        var timeB = xx; // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
        //  var timeB = new Date(2012,1,24,0,0,1,0); 
        // วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
        // เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
        var timeDifference = timeB.getTime()-timeA.getTime();    
        if(timeDifference>=0){
            timeDifference=timeDifference/1000;
            timeDifference=Math.floor(timeDifference);
            var wan=Math.floor(timeDifference/86400);
            var l_wan=timeDifference%86400;
            var hour=Math.floor(l_wan/3600);
            var l_hour=l_wan%3600;
            var minute=Math.floor(l_hour/60);
            var second=l_hour%60;
            var showPart=document.getElementById('showRemain');
            showPart.innerHTML="เหลือเวลา "+hour+" ชั่วโมง "
            +minute+" นาที "+second+" วินาที"; 
                if(wan==0 && hour==0 && minute==0 && second==0){
                    countTimer(-1);
                    clearInterval(countdown); // ยกเลิกการนับถอยหลังเมื่อครบ
                    // เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
                }
        }
    }, 1000);
}
var overtime;
function countTimer(totalSeconds) {
    $('.over_time').show();
    overtime=setInterval(function(){ 
        ++totalSeconds;
        var hour = Math.floor(totalSeconds /3600);
        var minute = Math.floor((totalSeconds - hour*3600)/60);
        var seconds = totalSeconds - (hour*3600 + minute*60);

        var over_time = "เกินเวลา " + hour + " ชั่วโมง " + minute + " นาที " + seconds+" วินาที";
        $('#over_time').html(over_time);
    }, 1000);
}
// window.onload = function(){
//     hide();
// }
// function hide(){
//     document.getElementById("submit").style.display = "none";
// }
function stop(){
    if(check==1){
        now = new Date();
        hour = "" + now.getHours(); 
        if (hour.length == 1) { 
            hour = "0" + hour; 
        }    
        minute = "" + now.getMinutes(); 
        if (minute.length == 1) { 
            minute = "0" + minute; 
        }    
        second = "" + now.getSeconds(); 
        if (second.length == 1) { 
            second = "0" + second; 
        }    
        
        var end_time = " " + hour + ":" + minute + ":" + second; 
        clearInterval(countdown);  
        clearInterval(overtime);
        $('#end_time').html(end_time);
        $('input[name = "end_time"]').val(end_time);
        $('#end_button').attr('disabled','disabled');
        check  = 2;
        document.getElementById("submit").style.display = "block";
    }
   
}
function submit(){
    alert("asd");
    if(check != 2){
        return false;
    }
}
// การเรียกใช้
//var iCountDown=setInterval("countDown()",1000); 

</script>
@endsection