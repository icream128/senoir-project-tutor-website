@extends('layouts.tutorheader')
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
                <li class="active" >รอสักครู่</li>
                <li style="font-size: 14px;">รายละเอียดคอร์ส</li>
            </ul>
        </div>
        <div class="col-md-3"></div>
    </div>

        <!-- fieldsets -->
        <fieldset  style="background-color:#D8D8D8;padding:20px;border-radius:25px;">
            <h1>รอสักครู่</h1>
    

            <input type="button" name="next" class="next action-button" value="Next" onclick = ""/>
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
            <h1>รายละเอียดคอร์ส</h1>
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
                                                <p>Laravel</p>
                                            </div>

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดสถานที่</label>
                                                <p>KMUTT</p>
                                            </div>

                                            <div class="col-md-6" style="margin-top:10px;">
                                                <label>รายละเอียดการเดินทาง</label>
                                                <p>ขึ้นรถเมย์มา</p>
                                            </div>

                                            <!-- Time Zone -->
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top:10px;">
                                                        <label class="fontsize">วันที่เริ่มเรียน</label>
                                                        <p>12/01/2017</p>
                                                    </div>

                                                    <div class="col-md-4" style="margin-top:10px;">
                                                        <label>เวลาที่เริ่ม</label>
                                                        <p>09:00</p>
                                                    </div>

                                                    <div class="col-md-4" style="margin-top:10px;">
                                                        <label>เวลาที่จบ</label>
                                                        <p>12:00</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Time Zone -->
                                            
                                        </div>    
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <input type="button" name="previous" class="previous action-button-previous" value="ย้อนกลับ"/>
        <input type="submit" name="submit" class="submit action-button" value="ตกลง"/>
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

