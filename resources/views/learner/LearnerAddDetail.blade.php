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
        <h1>เพิ่มรายละเอียดคอร์ส</h1>
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
                                    
                                        <div class="col-md-6" style="margin-top:10px;">
                                            <label>รายละเอียดบทเรียน</label>
                                            <textarea placeholder="รายละเอียดบทเรียน" rows="4" cols="50" name="detail_lesson" form="usrform" class="form-control"
                                                style="border-radius:10px;"></textarea>
                                        </div>

                                        <div class="col-md-6" style="margin-top:10px;">
                                            <label>รายละเอียดสถานที่</label>
                                            <textarea placeholder="รายละเอียดสถานที่" rows="4" cols="50" name="detail_location" form="usrform" class="form-control" 
                                                style="border-radius:10px;"></textarea>
                                        </div>

                                        <div class="col-md-6" style="margin-top:10px;">
                                            <label>รายละเอียดการเดินทาง</label>
                                            <textarea placeholder="รายละเอียดการเดินทาง" rows="4" cols="50" name="detail_transport" form="usrform" class="form-control"
                                                style="border-radius:10px;"></textarea>
                                        </div>
                                        <div class="col-md-6" style="margin-top:10px;">
                                            <label>ราคาต่อชั่วโมง</label>
                                            <input placeholder="ราคาต่อชั่วโมง" name="price"  class="form-control"
                                                style="border-radius:10px;"/>
                                        </div>


                                        <!-- Time Zone -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4" style="margin-top:10px;">
                                                    <label class="fontsize">วันที่เริ่มเรียน</label>
                                                    <input type="date" name="start_date" class="form-control" style="border-radius:10px;"/>  
                                                </div>

                                                <div class="col-md-4" style="margin-top:10px;">
                                                    <label>เวลาที่เริ่ม</label>
                                                    <input type="time" name="start_time" class="form-control" style="border-radius:10px;"/>   
                                                </div>

                                                <div class="col-md-4" style="margin-top:10px;">
                                                    <label>เวลาที่จบ</label>
                                                    <input type="time" name="end_time" class="form-control" style="border-radius:10px;"/>   
                                                </div>

                                            </div>
                                            <div class="row">
                                            <div class="col-md-4" style="margin-top:10px;">
                                            <input type="text" placeholder="จำนวนชั่วโมง" name="time"  class="form-control" style="border-radius:10px;"/>   
                                                <h4>ชั่วโมง</h4>
                                                </div>
                                                <div class="col-md-4" style="margin-top:10px;">
                                                <input type="text" placeholder="จำนวนเงิน" name="total"  class="form-control" style="border-radius:10px;"/>   
                                                <h4>บาท</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Time Zone -->
                                    </div>    
                                   
                            </div>
                        </div>
                       
                    </div>
                   
                </div>
                <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit" style="font-size: 17px;">เพิ่มรายละเอียดคอร์ส</button>
</form>    
            </div>
            
            
            <div class="col-md-1"></div>
        </div>
    </div>

        

    <!-- Plugin JavaScript -->
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    

@endsection
@section('script')
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
        
 })
    $('input[name="end_time"]').change(function(){
        diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
        
    })
    $('input[name="price"]').keyup(function(){
        diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
    })
})
</script>

@endsection