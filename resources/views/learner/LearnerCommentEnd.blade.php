@extends('layouts.learnerheader')

@section('content')
    <head>
        <title>Comment</title>
        <link rel="stylesheet" href="css/rating.css">
        <!-- <link rel="stylesheet" href="css/StarRating.css">
        <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    </head>

    <style>
        div h5 {
            font-size:20px;
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
            font-size:20px;
        }

        a:focus, a:hover {
            color: #ffffff;
        }
    </style>

    <div class="container">

        <section class="text-center">   
            <h1>แสดงความคิดเห็น</h1>
            <center><hr></center>
        </section>
        
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <img border="0" class="img-circle img-responsive infinite pulse" src="{{$learnerProfilePage->img_profile}}"
                    style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px;margin-bottom:10px" alt="Cinque Terre" width="300px" height="300px">
                    <br><br>
                </div>

                <div class="col-md-4 col-sm-12 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 text-right">
                                <br>
                                <p>ชื่อ :</p>
                                <p>ชื่อเล่น :</p>
                                <p>เพศ :</p>
                                <p>ระดับชั้น :</p>
                                <p>สถานศึกษา :</p>
                                <p>ประสบการณ์สอน :</p>
                            </div>
                            <div class="col-md-6 col-sm-6 text-left">
                                <br>
                                <p>{{$learnerProfilePage->firstname}} {{$learnerProfilePage->lastname}}</p>
                                <p>{{$learnerProfilePage->nickname}}</p>
                                <p>{{$learnerProfilePage->gender}}</p>
                                <p>{{$learnerProfilePage->level}}</p>
                                <p>{{$learnerProfilePage->school}}</p>
                                <p>{{$learnerProfilePage->experience}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 text-right">
                                <br>
                                <p>&nbsp</p>
                                <p>อายุ :</p>
                                <p>&nbsp</p>
                                <p>เกรดเฉลี่ย :</p>
                            </div>
                            <div class="col-md-6 col-sm-6 text-left">
                                <br>
                                <p>&nbsp</p>
                                <p>{{$learnerProfilePage->age}}</p>
                                <p>&nbsp</p>
                                <p>{{$learnerProfilePage->grade}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <form action="/learnersavecommentend&<?php echo $courseDetail->agreement_id ?>&<?php echo $courseDetail->user_id_request ?>" method='post' enctype="multipart/form-data" id="commentform">
        {{ csrf_field() }}
            <center>
            <!-- rating -->
            <div class="stars">
                <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                <label class="star star-1" for="star-1"></label>
            </div>

            <!-- input comment -->
            <div class="form-group">
                <h4 for="comment">ความคิดเห็น</h4>
                <center><textarea name="comment" id="comment" cols="50" rows="5"
                    maxlength="300" style="border-radius:5px;"></textarea></center>
            </div>
            </center>
                    

            <br><br>

            <!-- Trigger the modal with a button -->
            <center>
                <button type="button" class="btn btn-info btn-lg" style="background-color:#f05f40;" data-toggle="modal" data-target="#myModal">ส่งความคิดเห็น</button>
            </center>


            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                        
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <center><h4 class="modal-title">ตรวจสอบอีกครั้ง</h4></center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                                
                        <!-- Body Popup -->
                        <div class="w3-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-8 text-center" style="padding-bottom=10px;margin-top:40px;">
                                        <center>
                                            <h4 class="modal-title">คุณมั่นใจแล้วใช่ไหม</h4><br>
                                            <button class="btn btn-primary js-scroll-trigger" type="submit" style="font-size: 20px;background-color:#f05f40;">ยืนยัน</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>  
                    </div>
                        
                </div>
            </div>

        </form>
    </div>
            
    <br><br><br>
                

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
    <!-- <script src="js/StarRating.js"></script> -->
@endsection