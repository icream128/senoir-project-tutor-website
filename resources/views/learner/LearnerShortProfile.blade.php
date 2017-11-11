@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/rating.css">

@section('content')
<style>
    body {
      
      background-image: url("/img/tutor.png");
      background-attachment: fixed;
      background-size: auto;
      background-repeat: no-repeat;
      background-position: right;

    }
    div h5 {
        font-size:15px;
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
        font-size:20px;
    }

    a:focus, a:hover {
        color: #ffffff;
    }

</style>

    <br>
    
    <section class="text-center">   
        <h1>ประวัติส่วนตัวติวเตอร์</h1>
        <center><hr></center>

    </section>
    
    <div class="container">
        <div class="row">
            @foreach($learnerProfilePage as $key =>$value)
            <div class="col-md-4 text-center">
                <img border="0" class="img-circle img-responsive infinite pulse" src="{{$value->img_profile}}" 
                style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px;margin-bottom:10px" alt="Cinque Terre" width="300px" height="300px">
                <br>
                <div class="stars">
                    <input class="star star-5" id="{{ $key}}star-5" type="radio" name="{{ $key}}star" data-waschecked="true" {{ $value->frequency == 5 ? "checked" : "" }} value="5"/>
                    <label class="star star-5" for="{{ $key}}star-5"></label>
                    <input class="star star-4" id="{{ $key}}star-4" type="radio" name="{{ $key}}star" {{ $value->frequency == 4 ? "checked" : "" }} value="4"/>
                    <label class="star star-4" for="{{ $key}}star-4"></label>
                    <input class="star star-3" id="{{ $key}}star-3" type="radio" name="{{ $key}}star" {{ $value->frequency == 3 ? "checked" : "" }} value="3"/>
                    <label class="star star-3" for="{{ $key}}star-3"></label>
                    <input class="star star-2" id="{{ $key}}star-2" type="radio" name="{{ $key}}star" {{ $value->frequency == 2 ? "checked" : "" }} value="2"/>
                    <label class="star star-2" for="{{ $key}}star-2"></label>
                    <input class="star star-1" id="{{ $key}}star-1" type="radio" name="{{ $key}}star" {{ $value->frequency == 1 ? "checked" : "" }} value="1"/>
                    <label class="star star-1" for="{{ $key}}star-1"></label>
                </div>
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
                            <p>ประสบการณ์สอน :</p>
                        </div>
                        <div class="col-md-6 text-left">
                            <br>
                            <p>{{$value->firstname}}</p>
                            <p>{{$value->nickname}}</p>
                            <p>{{$value->gender}}</p>
                            <p>{{$value->level}}</p>
                            <p>{{$value->school}}</p>
                            <p>{{$value->experience}}&nbsp</p>
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
                            <p>{{$value->lastname}}</p>
                            <p>{{$value->age}}</p>
                            <p>&nbsp</p>
                            <p>{{$value->grade}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <br><br>
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

    <script>
        $(":radio").click( function(){
            return false;
        });
    </script>

@endsection
