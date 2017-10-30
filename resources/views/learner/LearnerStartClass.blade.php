@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

</style>

@section('content')

    <section id="services" class="text-center">   
        <h1>เริ่มการเรียนการสอน</h1>
        <center><hr></center>      
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            
            <div class="col-md-10">
            <form action="{{ url('/learnersavedetail')}}" method='post' enctype="multipart/form-data">    
            {{ csrf_field() }}
            <div class="container">
                    <div class="row"> 
                  
                        <div class="col-md-12"  style="background-color:#D8D8D8;border-radius:25px;padding:10px;">


                            <div class="container">
                                    <div class="row">
                                       
                                        <div class="container">
                                            <div class="row">
                                               
                                                <div class="col-md-4" style="margin-top:10px;">
                                                    <label>เวลาที่เริ่ม</label>
                                                    <div id="showRemain"></div>
                                                    <button class="btn btn-primary btn-xl js-scroll-trigger" type="button" onclick="countDown();" style="font-size: 17px;">เริ่มเรียน</button>   
                                                </div>

                                                <div class="col-md-4" style="margin-top:10px;">
                                                    <label>เวลาที่จบ</label>
                                                    <h4></h4>  
                                                    <button class="btn btn-primary btn-xl js-scroll-trigger" type="button" style="font-size: 17px;">เรียนเสร็จ</button>
                                                </div>

                                            </div>
                                           
                                        </div>
                                       
                                    </div>    
                                   
                            </div>
                        </div>
                       
                    </div>
                   
                </div>
               
</form>    
            </div>
            
            
            <div class="col-md-1"></div>
        </div>
    </div>

        

    <!-- Plugin JavaScript -->
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    

@endsection
@section('script')
<script type="text/javascript">
function countDown(){
    start = '{{$frequency->start_time}}';
    end = '{{$frequency->end_time}}';
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);
    var time = hours;
    alert(diff/1000);

    var t = new Date();
    t.setSeconds(t.getSeconds() + 10);

    Date.prototype.addSeconds= function(s){
        this.setSeconds(this.getSeconds()+s);
        return this;
    }
    var xx = new Date().addSeconds(diff/1000);
    //alert(xx);
    setInterval(function(){ 
        var timeA = new Date(); // วันเวลาปัจจุบัน
        var timeB = xx; // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
        //  var timeB = new Date(2012,1,24,0,0,1,0); 
        // วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
        // เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
        var timeDifference = timeB.getTime()-timeA.getTime();    
        //if(timeDifference>=0){
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
                    clearInterval(iCountDown); // ยกเลิกการนับถอยหลังเมื่อครบ
                    // เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
                }
       // }
    }, 1000);
}
// การเรียกใช้
//var iCountDown=setInterval("countDown()",1000); 
</script>
@endsection