@extends('layouts.tutorheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    div h5 {
        font-size:17px;
    }

    .btn-tutor {
        color: #fff;
        border-color: #FF8000;
        background-color: #FF8000;
    }

    div label {
        font-size: 20px;
    }

    .marginnaja {
        margin-top:10px;
    }
    .img-circle {
    border-radius: 50%;
}
</style>

@section('content')
    <br>
    <div id="services" class="col-md-12 text-center">
        <h1>แก้ไขข้อมูลส่วนตัว</h1>
        <center><hr class="btn-tutor"></center>      
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-10">
                <div class="container">
                    <div class="row" style="margin:5px">
                        <form method='post' action="/updatedy&<?php echo $tutorProfile->user_id ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            
                            <!-- Username and Password -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;padding-bottom:30px">
                                <div class="col-md-12 marginnaja"><h2>บัญชีผู้ใช้</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <div class="row">
                                        <center>
                                            <label>รูปโปรไฟล์</label>
                                            <div style="margin-top:20px;">
                                                <img src="" id="blah1" alt="" width="300px" height="300px" class="img-circle" value="{{$tutorProfile->img_profile}}">
                                                <input type="file" id="imgInp_profile" name="img_profile" >
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6 marginnaja">
                                    <br>
                                    <div class="marginnaja">
                                        <label>ชื่อผู้ใช้</label>
                                        <input placeholder="ชื่อผู้ใช้" name="username" class="form-control" style="border-radius:10px;" value="{{$tutorProfile->username}}" readonly="readonly"/>
                                    </div>
                                    <div class="marginnaja">
                                        <label>อีเมล</label>
                                        <input placeholder="อีเมล" name="email"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->email}}"/>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <br>

                            <!-- Profile -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;padding-bottom:30px">
                                <div class="col-md-12 marginnaja"><h2>ข้อมูลส่วนตัว</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อจริง</label>
                                    <input type="text" placeholder="ชื่อจริง" name="firstname"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->firstname}}"/>
                                </div>
                            
                                <div class="col-md-6 marginnaja">
                                    <label>นามสกุล</label>
                                    <input type="text" placeholder="นามสกุล" name="lastname"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->lastname}}"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อเล่น</label>
                                    <input type="text" placeholder="ชื่อเล่น" name="nickname"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->nickname}}"/> 
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>เลขบัตรประชาชน</label>
                                    <input type="text" placeholder="เลขบัตรประชาชน" name="card_id"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->card_id}}" readonly="readonly"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>วันเดือนปีเกิด</label>
                                    <input type="date" name="birthday"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->birthday}}"/>  
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>อายุ</label>
                                    <input type="text" placeholder="อายุ" name="age"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->age}}"/>   

                                </div>

                                <div class="container marginnaja">
                                    <div class="row">
                                
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>รูปบัตรประชาชน</label>
                                                </div>
                                                <div class="col-md-6" style="margin-top:20px;">
                                                    <center><img src="" id="blah2" alt="" width="100px" height="100px" class="img-circle"></center>
                                                </div>
                                                
                                                <div class="col-md-3" style="margin-top:20px;">
                                                    <input type="file" id="imgInp_card" name="img_card">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-6 marginnaja">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="tel"  class="form-control" style="border-radius:10px;" value="{{$tutorProfile->tel}}"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>ที่อยู่ปัจจุบัน</label>
                                    <textarea placeholder="ที่อยู่ปัจจุบัน" rows="4" cols="50" id="address" name="address" class="form-control"
                                                style="border-radius:10px;" >{{$tutorProfile->address}}</textarea>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>สถานศึกษาปัจจุบัน</label>
                                    <input type="text" placeholder="สถานศึกษาปัจจุบัน" name="school" class="form-control" style="border-radius:10px;" value="{{$tutorProfile->school}}"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>ระดับชั้น</label>
                                    <input type="text" placeholder="ระดับชั้นที่กำลังศึกษา" name="level" class="form-control" style="border-radius:10px;" value="{{$tutorProfile->level}}"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>เกรดเฉลี่ยสะสม</label>
                                    <input type="text" placeholder="เกรดเฉลี่ยสะสม" name="grade" class="form-control" style="border-radius:10px;" value="{{$tutorProfile->grade}}"/>
                                </div>
                            </div>

                            <br>
                            
                            <!-- Reference -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;padding-bottom:30px">
                                <div class="col-md-12 marginnaja"><h2>บุคคลอ้างอิงที่ติดต่อได้</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" placeholder="ชื่อจริง-นามสกุล" name="ref_name" class="form-control" style="border-radius:10px;" value="{{$tutorProfile->ref_name}}"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>ความสัมพันธ์</label>
                                    <input type="text" placeholder="ความสัมพันธ์" name="ref_relation" class="form-control" style="border-radius:10px;" value="{{$tutorProfile->ref_relation}}"/>
                                </div>
                                <div class="col-md-6 marginnaja tutor-only" style="display:none">
                                    <label>ประสบการณ์</label>
                                    <textarea placeholder="ประสบการณ์" rows="4" cols="50" name="experience" form="usrform" class="form-control"
                                                style="border-radius:10px;"></textarea>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="ref_tel" class="form-control" style="border-radius:10px;" value="{{$tutorProfile->ref_tel}}"/>
                                </div>
                            </div>
                            <br><br>
                            <center>
                                <input type="submit" class="btn btn-tutor btn-xl js-scroll-trigger" style="font-size: 20px;background-color: #FF8000;" name="update" value="อัพเดต"/>
                            </center>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>


    <br><br>
@endsection



@section('script')
        <script src="js/jquery.validate.js"></script>

        <script>
        $.validator.setDefaults({
            submitHandler: function(form){
                submitForm(form.id);
            }
        });
        $(document).ready(function(){

            $('input[name="role"]').click(function(){
                if($(this).val() == '2'){
                    $('.tutor-only').show();
                }
                else{
                    $('.tutor-only').hide();
                }
            });

            $("#imgInp_profile").change(function(){
                readURL1(this);
            });
            $("#imgInp_card").change(function(){
                readURL2(this);
            });
            $("#registerform").validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    confirm_password: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        mail: true
                    },
                    img_card: {
                        required: true

                    },
                    img_profile: {
                        required: true

                    },
                    tel: {
                        required: true,
                        minlength: 9
                    },
                    place: {
                        required: true
                    },
                    school: {
                        required: true

                    },
                    level: {
                        required: true

                    },
                    grade: {
                        required: true

                    },
                    ref_relation: {
                        required: true

                    },
                    ref_name: {
                        required: true

                    },
                    ref_tel: {
                        required: true
                    },

                    gender: {
                        required: true
                    },

                    birthday: {
                        required: true
                    },

                    card_id: {
                        required: true,
                        minlength: 13
                    },
                    nickname: {
                        required: true
                    },
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    role: {
                        required: true
                    }

                },

                messages: {

                    username: {
                        required: "กรุณากรอกชื่อผู้ใช้"

                    },
                    password: {
                        required: "กรุณากรอกรหัสผ่าน",
                        minlength: "รหัสผ่านต้องมีอย่างน้อย 6 ตัว"
                    },
                    confirm_password: {
                        required: "กรุณากรอกยืนยันรหัสผ่าน",
                        minlength: "รหัสผ่านต้องมีอย่างน้อย 6 ตัว",
                        equalTo: "รหัสผ่านไม่ตรงกัน"
                    },
                    email: {
                        required: "กรุณากรอกอีเมล์",
                        mail: "กรุณากรอกอีเมล์"
                    },

                    img_profile: "กรุณาเลือกรูปโปรไฟล์",
                    img_card: "กรุณาเลือกรูปบัตรประชาชน",
                    tel: {
                        required: "กรุณากรอกเบอร์โทรศัพท์",
                        minlength: "รหัสผ่านต้องมีอย่างน้อย 9 ตัว"
                    },
                    card_id: {
                        required: "กรุณากรอกเลขบัตรประชาชน",
                        minlength: "กรุณากรอกเลขบัตรประชาชนให้ครบ 13 หลัก"
                    },
                    place: "กรุณากรอกที่อยู่",
                    school: "กรุณากรอกสถานศึกษา",
                    level: "กรุณากรอกระดับการศึกษา",
                    grade: "กรุณากรอกเกรดเฉลี่ยสะสม",
                    ref_relation: "กรุณากรอกความสัมพันธ์กับบุคคลอ้างอิง",
                    ref_name: "กรุณากรอกชื่อบุคคลอ้างอิง",
                    ref_tel: "กรุณากรอกเบอร์โทรศัพท์บุคคลอ้างอิง",
                    gender: "กรุณาระบุเพศ",
                    birthday: "กรุณากรอกวันเดือนปีเกิด",
                    nickname: "กรุณากรอกชื่อเล่น",
                    firstname: "กรุณากรอกชื่อจริง",
                    lastname: "กรุณากรอกนามสกุล",
                    role: "กรุณาระบุประเภทผู้ใช้"
                }
            });

            $('input[name="birthday"]').change(function(){
                //alert($(this).val());
                var dob = $(this).val();
                var now = new Date();
                var birthdate = dob.split("-");
                var born = new Date(birthdate[0],birthdate[1],birthdate[2]);
                var birthday = new Date(now.getFullYear(), born.getMonth(), born.getDate());
                $('input[name="age"]').val(now.getFullYear() - born.getFullYear())
            })
         });

        function submitForm(formId){
            alert(formId);

            $.ajax({
                url: "{{ url('/registersave')}}",
                type: 'POST',
                data: new FormData($('#'+formId)[0]),
                cache: false,
                contentType: false,
                processData: false,

                xhr: function(){
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',function(e){
                            if(e.lengthComputable){
                                $('process').attr({
                                    value: e.loaded,
                                    max: e.total
                                });
                            }

                        },false);
                    }
                    return myXhr;
                },
                success:function(){
                    $('#myModal span.name').text(($('input[name="username"]').val()));
                    $('#myModal span.email').text(($('input[name="email"]').val()));
                    $('#myModal').modal('show');
                }

            })
        }
        function readURL1(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        </script>


@endsection
