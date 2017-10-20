@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    div h5 {
        font-size:15px;
    }
    
    div p {
        font-size: 1.5rem;
    }

    .margin-naja {
        margin-top:10px;
    }
    .img-circle {
        border-radius: 50%;
    }
    label{
        font-size: 20px;
    }
    
    div p {
        font-size: 1.5rem;
    }

    a:focus, a:hover {
        color: #ffffff;
    }

</style>

@section('content')

    <br>
    
    <section class="text-center">   
        <h1>ประวัติส่วนตัว</h1>
        <center><hr></center>

    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img border="0" class="img-circle img-responsive infinite pulse" src="{{$learnerProfile->img_profile}}" 
                style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px;margin-bottom:10px" alt="Cinque Terre" width="300px" height="300px">
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
                        </div>
                        <div class="col-md-6 text-left">
                            <br>
                            <p>{{$learnerProfilePage->firstname}}</p>
                            <p>{{$learnerProfilePage->nickname}}</p>
                            <p>{{$learnerProfilePage->gender}}</p>
                            <p>{{$learnerProfilePage->level}}</p>
                            <p>{{$learnerProfilePage->school}}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <br>
                            <p>นามสกุล :</p>
                            <p>อายุ :</p>
                            <p>&nbsp</p>
                            <p>เกรดเฉลี่ย :</p>
                        </div>
                        <div class="col-md-6 text-left">
                            <br>
                            <p>{{$learnerProfilePage->lastname}}</p>
                            <p>{{$learnerProfilePage->age}}</p>
                            <p>&nbsp</p>
                            <p>{{$learnerProfilePage->grade}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    
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
