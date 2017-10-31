@extends('layouts.tutorheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@section('content')
<style>
    body {
        
        background-image: url("/img/learner.png");
        background-size: auto;
        background-repeat: no-repeat;
        background-position: left;
        background-attachment: fixed;
    }
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

    a:focus, a:hover {
        color: #ffffff;
    }

</style>
    <br>
    
    <section class="text-center">   
        <h1>ประวัติส่วนตัวนักเรียน</h1>
        <center><hr class="btn-tutor"></center>      
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img border="0" class="img-circle img-responsive infinite pulse" src="{{$tutorProfilePage->img_profile}}" 
                style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px;margin-bottom:10px" alt="Cinque Terre" width="300px" height="300px">
                <br><br>
            </div>
            <div class="col-md-2 text-right">
                <br>
                <p>ชื่อ :</p>
                <p>ชื่อเล่น :</p>
                <p>เพศ :</p>
                <p>ระดับชั้น :</p>
                <p>สถานศึกษา :</p>
                
            </div>
            <div class="col-md-2 text-left">
                <br>
                <p>{{$tutorProfilePage->firstname}}</p>
                <p>{{$tutorProfilePage->nickname}}</p>
                <p>{{$tutorProfilePage->gender}}</p>
                <p>{{$tutorProfilePage->level}}</p>
                <p>{{$tutorProfilePage->school}}</p>
                
            </div>
            
            <div class="col-md-2 text-right">
                <br>
                <p>นามสกุล :</p>
                <p>อายุ :</p>
                <p>&nbsp</p>
                <p>เกรดเฉลี่ยสะสม :</p>
            </div>
            <div class="col-md-2 text-left">
                <br>
                <p>{{$tutorProfilePage->lastname}}</p>
                <p>{{$tutorProfilePage->age}}</p>
                <p>&nbsp</p>
                <p>{{$tutorProfilePage->grade}}</p>
            </div>
            
        </div>
    </div>

@endsection
@section('script')

        
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
