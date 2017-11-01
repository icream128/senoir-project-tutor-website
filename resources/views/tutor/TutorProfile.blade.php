@extends('layouts.tutorheader')

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
    .btn-tutor {
        color: #fff;
        border-color: #FF8000;
        background-color: #FF8000;
    }

</style>

@section('content')

    <br><br><br><br><br>

    <div class="col-md-12 text-center">
        <h1>ประวัติส่วนตัว</h1>
        <center><hr class="btn-tutor"></center>

    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-10">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="container">
                                <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px">
                                    <!-- Username and Password -->
                                    <div class="col-md-6 margin-naja"><h2 >บัญชีผู้ใช้</h2></div>
                                    <div class="col-md-6 margin-naja text-right">
                                        <a class="btn btn-l js-scroll-trigger"
                                           style="font-size: 17px;width: 120px;font-weight: normal;background-color: #FF8000;color: #ffffff;" href="{{ url('') }}/tutoreditprofile&<?php echo $tutorProfilePage->user_id ?>">แก้ไขโปรไฟล์</a>

                                    </div>
                                    <div class="col-md-12 margin-naja text-center">
                                        <label>รูปโปรไฟล์</label>
                                        <div class="text-center" style="margin-top:20px;">
                                            <img src="{{$tutorProfilePage->img_profile}}" width="200px" height="200px" class="img-circle text-center">
                                        </div>
                                    </div>
                                    <div class="col-md-12 margin-naja text-center">
                                        <label>อีเมล :</label>
                                        <label>{{$tutorProfilePage->email}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        &nbsp

                        <div class="col-md-12">
                            <div class="container">
                                <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px">
                                    <!-- Profile -->

                                    <div class="col-md-12 margin-naja"><h2 style="margin-top:10px">ข้อมูลส่วนตัว</h2></div>
                                    <div class="col-md-6 margin-naja">
                                        <label>ชื่อจริง :</label>
                                        <label>{{$tutorProfilePage->firstname}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>นามสกุล :</label>
                                        <label>{{$tutorProfilePage->lastname}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>ชื่อเล่น :</label>
                                        <label>{{$tutorProfilePage->nickname}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>เลขบัตรประชาชน :</label>
                                        <label>{{$tutorProfilePage->card_id}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>วันเดือนปีเกิด :</label>
                                        <label>{{$tutorProfilePage->birthday}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>อายุ :</label>
                                        <label>{{$tutorProfilePage->age}}</label>
                                        <label>ปี</label>
                                    </div>

                                    <div class="container margin-naja">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>เพศ :</label>
                                                        <label>{{$tutorProfilePage->gender}}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label>รูปบัตรประชาชน :</label>
                                                    </div>
                                                    <div class="col-md-7" style="margin-top:20px;">
                                                        <img src="{{$tutorProfilePage->img_card}}" width="ึ80px" height="100px" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>เบอร์โทรศัพท์ :</label>
                                        <label>{{$tutorProfilePage->tel}}</label>
                                    </div>

                                    <div class="col-md-6 marginnaja">
                                        <label>ที่อยู่ปัจจุบัน :</label>
                                        <label>{{$tutorProfilePage->address}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>สถานศึกษาปัจจุบัน :</label>
                                        <label>{{$tutorProfilePage->school}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>ระดับชั้น :</label>
                                        <label>{{$tutorProfilePage->level}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>เกรดเฉลี่ยสะสม :</label>
                                        <label>{{$tutorProfilePage->grade}}</label>
                                    </div>
                                    <div class="col-md-6 margin-naja">
                                        <label>ประสบการณ์สอน :</label>
                                        <label>{{$tutorProfilePage->experience}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        &nbsp

                        <div class="col-md-12">
                            <div class="container">
                                <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px">
                                    <!-- Reference -->
                                    <div class="col-md-12 margin-naja"><h2 style="margin-top:10px">บุคคลอ้างอิงที่ติดต่อได้</h2></div>
                                    <div class="col-md-6 margin-naja">
                                        <label>ชื่อ-นามสกุล :</label>
                                        <label>{{$tutorProfilePage->ref_name}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>ความสัมพันธ์ :</label>
                                        <label>{{$tutorProfilePage->ref_relation}}</label>
                                    </div>

                                    <div class="col-md-6 margin-naja">
                                        <label>เบอร์โทรศัพท์ :</label>
                                        <label>{{$tutorProfilePage->ref_tel}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>

    <br><br>

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
