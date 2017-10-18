@extends('layouts.learnerheader')

@section('content')
<style>
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

<br>
<center>
<!-- MultiStep Form -->
<div class="row">
<div class="col-md-12">
    <form id="msform">
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <!-- progressbar -->
            <ul id="progressbar" style="padding:15px;">
                <li class="active" >ข้อมูลผู้ส่งคำร้อง</li>
                <li style="font-size: 14px;">เพิ่มรายละเอียดคอร์ส</li>
            </ul>
        </div>
        <div class="col-md-3"></div>
    </div>

        <!-- fieldsets -->
        <fieldset  style="background-color:#D8D8D8;padding:20px;border-radius:25px;">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10"  style="background-color:#D8D8D8;border-radius:25px;">

                    <div class="container">
                        <div class="row" style="margin:5px">
                            <div class="col-lg-1 col-sm-3 text-center" style="padding-bottom=10px;"></div>
                            <div class="col-lg-3 col-sm-3 text-center" style="padding-bottom=10px;">
                                <div class="service-box">              
                                    <div class="container">   
                                        <img class="img-circle img-responsive" 
                                        style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="120" height="120"> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-sm-2 text-right pad">
                                <div class="service-box">              
                                <h5>ชื่อ :</h5>
                                <h5>วิชา :</h5>
                                <h5>วัน :</h5>
                                <h5>เวลาเริ่ม :</h5>
                                <h5>สถานที่ :</h5>
                                <h5>สถานะ :</h5>              
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-5 text-left pad" style="padding-left: 0px;">
                                <div class="service-box">              
                                <h5 id="name"></h5>
                                <h5 id="subject"></h5>
                                <h5 id="day"></h5>
                                <h5 id="startTime"></h5>
                                <h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>
                                <h5 id="สถานะ"></h5>
                                </div>
                            </div>
                            
                        </div>          
                    </div>

                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

            <input type="button" name="next" style="background:red" class="next action-button" value="ปฏิเสธ" onclick = ""/>
            <input type="button" name="next" style="background:green"  class="next action-button" value="ยอมรับ" onclick = ""/>
        </fieldset>

        <!-- <fieldset  style="background-color:#D8D8D8;padding:20px;border-radius:25px;">
            <h2 class="fs-title">Social Profiles</h2>
            <h3 class="fs-subtitle">Your presence on the social network</h3>
            <input type="text" name="twitter" placeholder="Twitter"/>
            <input type="text" name="facebook" placeholder="Facebook"/>
            <input type="text" name="gplus" placeholder="Google Plus"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
            <input type="button" name="next" class="next action-button" value="Next"/>
        </fieldset> -->

        <!-- Part 3 -->
        <fieldset  style="background-color:#D8D8D8;padding:20px;border-radius:25px;">
        <section id="services" class="text-center" style="padding-bottom: 0px;">   
            <h1>เพิ่มรายละเอียดคอร์ส</h1>
            <center><hr></center>      
        </section>

        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-12"  style="background-color:#D8D8D8;border-radius:25px;padding:10px;">
                                <div class="container">
                                    <form action="{{ url('/')}}" method='post' enctype="multipart/form-data">    
                                        <div class="row">

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดบทเรียน</label>
                                                <textarea placeholder="รายละเอียดบทเรียน" rows="4" cols="50" name="detail_lesson" form="usrform" class="form-control" style="border-radius:10px;"></textarea>
                                            </div>

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดสถานที่</label>
                                                <textarea placeholder="รายละเอียดสถานที่" rows="4" cols="50" name="detail_location" form="usrform" class="form-control" style="border-radius:10px;"></textarea>
                                            </div>

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดการเดินทาง</label>
                                                <textarea placeholder="รายละเอียดการเดินทาง" rows="4" cols="50" name="detail_transport" form="usrform" class="form-control" style="border-radius:10px;"></textarea>
                                            </div>
                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>ราคาต่อชั่วโมง</label>
                                                <input placeholder="ราคาต่อชั่วโมง" name="price"  class="form-control" style="border-radius:10px;"/>
                                            </div>

                                            <!-- Time Zone -->
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top:10px;">
                                                        <label class="fontsize">วันที่เริ่มเรียน</label>
                                                        <input type="date" name="startdate" class="form-control" style="border-radius:10px;"/>  
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
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12" style="margin-top:10px;">
                                                        <label>รวมทั้งหมด</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2" style="margin-top:10px;"></div>
                                                    <div class="col-md-4" style="margin-top:10px;">
                                                        <input type="text" placeholder="จำนวนชั่วโมง" name="time"  class="form-control" style="border-radius:10px;"/>   
                                                        <label>ชั่วโมง</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top:10px;">
                                                        <input type="text" placeholder="จำนวนเงิน" name="total"  class="form-control" style="border-radius:10px;"/>   
                                                        <label>บาท</label>
                                                    </div>
                                                    <div class="col-md-2" style="margin-top:10px;"></div>
                                                </div>
                                            </div>

                                            <!-- End Time Zone -->
                                            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

                                            <input type="submit" name="submit" class="submit action-button" value="เพิ่มรายละเอียดคอร์ส"/>
                                        </div>    
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        
        <!-- <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit" style="font-size: 17px;">เพิ่มรายละเอียดคอร์ส</button> -->
            
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


<script type="text/javascript" src="js/stepconfirm1.js"></script>

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

     });
        $('input[name="end_time"]').change(function(){
            diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())

        });
        $('input[name="price"]').keyup(function(){
            diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
        })
    })
</script>

@endsection

