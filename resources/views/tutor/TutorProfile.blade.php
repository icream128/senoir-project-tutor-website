@extends('layouts.tutorheader')

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
    
    div p {
        font-size: 1.5rem;
    }
    
    .btn-tutor {
        color: #fff;
        border-color: #FF8000;
        background-color: #FF8000;
    }

</style>

@section('content')

    <br>
    
    <section class="text-center">   
        <h1>ประวัติส่วนตัว</h1>
        <center><hr class="btn-tutor"></center>      
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img border="0" class="img-circle img-responsive infinite pulse" src="{{$tutorProfile->img_profile}}" 
                style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px;margin-bottom:10px" alt="Cinque Terre" width="300px" height="300px">
                <br><br>
                <a class="btn btn-tutor btn-xl js-scroll-trigger" style="font-size: 20px;background-color: #FF8000;" href="/tutoreditprofile&<?php echo $tutorProfilePage->user_id ?>">แก้ไขโปรไฟล์</a>
            </div>
            <div class="col-md-2 text-right">
                <p>ชื่อ :</p>
                <p>ชื่อเล่น :</p>
                <p>เพศ :</p>
                <p>ระดับชั้น :</p>
                <p>สถานศึกษา :</p>
                <p>ประสบการณ์สอน :</p>
            </div>
            <div class="col-md-2 text-left">
                <p>{{$tutorProfilePage->firstname}}</p>
                <p>{{$tutorProfilePage->nickname}}</p>
                <p>{{$tutorProfilePage->gender}}</p>
                <p>{{$tutorProfilePage->level}}</p>
                <p>{{$tutorProfilePage->school}}</p>
                <p>{{$tutorProfilePage->experience}}&nbsp</p>
            </div>
            
            <div class="col-md-2 text-right">
                <p>นามสกุล :</p>
                <p>อายุ :</p>
                <p>&nbsp</p>
                <p>เกรดเฉลี่ยสะสม :</p>
            </div>
            <div class="col-md-2 text-left">
                <p>{{$tutorProfilePage->lastname}}</p>
                <p>{{$tutorProfilePage->age}}</p>
                <p>&nbsp</p>
                <p>{{$tutorProfilePage->grade}}</p>
            </div>
            
        </div>
    </div>



        
    <script>
      var current_button = 0;
        setInterval(function () {
            if (current_button === $('.pulse').length) {
                $('.pulse').addClass('animated');
                current_button = 0;
            }
            else {
                $('.pulse').removeClass('animated');
                $('.pulse:eq(' + current_button + ')');

                current_button++;
            }
        }, 1000)
    </script>
        
@endsection
