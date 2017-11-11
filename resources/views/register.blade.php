@extends('layouts.loginheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    div h5 {
        font-size:17px;
    }

    div label {
        font-size: 20px;
    }

    .img-circle {
    border-radius: 50%;
    }

    .space{
        margin-top: 8px;
    }


     #nickname-error,#firstname-error,#tel-error
     ,#school-error,#level-error,#grade-error,#ref_relation-error,#ref_name-error
     ,#card_id-error,#address-error
     ,#ref_tel-error,#gender-error ,#birthday-error
     ,#lastname-error,#imgInp_card-error
     ,#imgInp_profile-error
     {
         font-size:13px;
         color:#ff0000;
         padding: 0px;
     }

    #email-error ,#username-error,#confirm_password-error,#password-error,#role-error {
        margin-left: 15px;
        font-size:13px;
        color:#ff0000;
        padding: 0px;
    }

    .text {
        display: block;
        width: 200px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .center-cropped {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        object-fit: cover;
        height: 300px;
        width: 300px;
        
    }
    .center-cropped-card {
        object-fit: none;
        object-position: center;
        object-fit: cover;
        height: 100px;
        width: 100px;
        
    }

</style>

@section('content')

    <div id="services" class="col-md-12 text-center">
        <h1>สมัครสมาชิก</h1>
        <center><hr style="border-color:#F98717;"></center>      
    </div>
    
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="container">
                    <div class="row" style="margin:5px">
                        <form action="{{ url('/registersave')}}" method='post' enctype="multipart/form-data" id="registerform">
                            {{ csrf_field() }}
                            <!-- Username and Password -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;">
                                <div class="col-md-12"><h2>ข้อมูลผู้ใช้</h2></div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <label style="padding-left: 15px;">รูปโปรไฟล์</label>
                                        <div style="margin-top:20px;" class="text-center">
                                            <img src="" id="blah1" alt="" class="img-circle center-cropped " style="margin-top: 20px">
                                            <input class="text" type="file" id="imgInp_profile" name="img_profile" style="margin-top: 8px;position: relative;">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <label id="imgInp_profile-error" class="error" for="imgInp_profile"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="margin-top: 50px">
                                    <div class="row">
                                        <label style="margin-bottom: 0px;margin-left:15px">บัญชีผู้ใช้</label>&nbsp<label style="color: red">*</label>
                                        <input autofocus required type="text" placeholder="ชื่อสำหรับเข้าสู่ระบบ" name="username" class="form-control" style="border-radius:10px;margin-right: 15px;margin-left:15px"/>
                                    </div>
                                    <div class="row space">
                                        <label style="margin-bottom: 0px;margin-left:15px">อีเมล</label>&nbsp<label style="color: red">*</label>
                                        <input type="email" placeholder="อีเมล" name="email"  class="form-control" style="border-radius:10px;margin-right: 15px;margin-left:15px"/>
                                    </div>
                                    <div class="row space">
                                        <label style="margin-bottom: 0px;margin-left:15px">รหัสผ่าน</label>&nbsp<label style="color: red">*</label>
                                        <input placeholder="รหัสผ่าน" name="password" id="password"  class="form-control" type="password" style="border-radius:10px;margin-right: 15px;margin-left:15px"/>
                                    </div>
                                    <div class="row space">
                                        <label style="margin-bottom: 0px;margin-left:15px">ยืนยันรหัสผ่าน </label>&nbsp<label style="color: red">*</label>
                                        <input placeholder="ยืนยันรหัสผ่าน" name="confirm_password"  class="form-control" type="password" style="border-radius:10px;margin-right: 15px;margin-left:15px"/>
                                    </div>
                                    <div class="row space">
                                        <label style="margin-left:15px">ประเภท</label>&nbsp<label style="color: red">*</label>
                                        <div class="col-md-1" style="margin-top:26px;">
                                            <input type="radio" value="2" name="role"/>
                                        </div>
                                        <div class="col-md-3" style="margin-top:20px;">
                                            <p>ติวเตอร์</p>
                                        </div>
                                        <div class="col-md-1" style="margin-top:26px;">
                                            <input type="radio" value="1" name="role"/>
                                        </div>
                                        <div class="col-md-3" style="margin-top:20px;">
                                            <p>นักเรียน</p>
                                        </div>
                                        <div class="col-md-2"></div>

                                        <div><label id="role-error" class="error" for="role"></label></div>
                                    </div>

                                </div>
                            </div>
                            
                            <br>

                            <!-- Profile -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;">
                                <div class="col-md-12 "><h2>ข้อมูลส่วนตัว</h2></div>
                                <div class="col-md-6 ">
                                    <label style="margin-bottom: 0px">ชื่อจริง</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="ชื่อจริง" name="firstname"  class="form-control" style="border-radius:10px;"/>
                                </div>
                            
                                <div class="col-md-6 ">
                                    <label style="margin-bottom: 0px">นามสกุล</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="นามสกุล" name="lastname"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">ชื่อเล่น</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="ชื่อเล่น" name="nickname"  class="form-control" style="border-radius:10px;"/> 
                                </div>

                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">เลขบัตรประชาชน</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" pattern="[0-9]" placeholder="เลขบัตรประชาชาน" name="card_id"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">วันเดือนปีเกิด</label>&nbsp<label style="color: red">*</label>
                                    <input type="date" name="birthday" value="2017-01-01"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">อายุ</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="อายุ" name="age"  class="form-control" style="border-radius:10px;"/>   

                                </div>

                                <div class="container space">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                
                                                <div class="col-md-2">
                                                        <label>เพศ</label>&nbsp<label style="color: red">*</label>
                                                </div>
                                                <div class="col-md-1" style="margin-top:26px;">
                                                    <input type="radio" value="ผู้ชาย" name="gender"/>
                                                        
                                                </div>
                                                <div class="col-md-3" style="margin-top:20px;">        
                                                    <p>ชาย</p>
                                                </div>
                                                <div class="col-md-1" style="margin-top:26px;">
                                                    <input type="radio" value="ผู้หญิง" name="gender"/>                  
                                                </div>
                                                <div class="col-md-3" style="margin-top:20px;">        
                                                    <p>หญิง</p>
                                                </div>

                                                <div class="col-md-2"></div>

                                            </div>
                                            <div class="col-md-12"><label id="gender-error" class="error" for="gender"></label></div>

                                        </div>

                                
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>รูปบัตรประชาชน</label>&nbsp<label style="color: red">*</label>
                                                </div>
                                                <div class="col-md-3" style="margin-top:20px;">
                                                    <img src="" class="center-cropped-card" id="blah2" alt="" width="100px" height="100px" >

                                                </div>
                                                <div class="col-md-5" style="margin-top:20px;">
                                                    <input class="text" type="file" id="imgInp_card" name="img_card">
                                                </div>
                                            </div>
                                            <label id="imgInp_card-error" style="margin: 0px" class="error" for="imgInp_card"></label>
                                            <label style="font-size: 12px;color:#868e96;margin-top: 10px ">กรุณาแนบรูปบัตรประชาชนให้ตรงกับข้อมูลที่กรอก เพื่อใช้ในการตรวจสอบความถูกต้องของข้อมูล</label>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-6 ">
                                    <label style="margin-bottom: 0px">เบอร์โทรศัพท์</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="tel"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 ">
                                    <label style="margin-bottom: 0px">ที่อยู่ปัจจุบัน</label>&nbsp<label style="color: red">*</label>
                                    <textarea name="address" id="address" placeholder="ที่อยู่ปัจจุบัน" rows="4" cols="50"
                                              class="form-control"
                                              style="border-radius:10px"></textarea>
                                </div>
                                
                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">สถานศึกษาปัจจุบัน</label>
                                    <input type="text" placeholder="สถานศึกษาปัจจุบัน" name="school" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">ระดับชั้น</label>
                                    <input type="text" placeholder="ระดับชั้นที่กำลังศึกษา" name="level" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">เกรดเฉลี่ยสะสม</label>
                                    <input type="text" pattern=" [0-9]" placeholder="เกรดเฉลี่ยสะสม" name="grade" class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 tutor-only space" style="display:none">
                                    <label style="margin-bottom: 0px">ประสบการณ์</label>
                                    <textarea placeholder="ประสบการณ์" rows="4" cols="50" name="experience" class="form-control"
                                                style="border-radius:10px;"></textarea>
                                </div>
                            </div>

                            <br>
                            
                            <!-- Reference -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;">
                                <div class="col-md-12 "><h2>บุคคลอ้างอิงที่ติดต่อได้</h2></div>
                                <div class="col-md-6 ">
                                    <label style="margin-bottom: 0px">ชื่อ-นามสกุล</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="ชื่อจริง-นามสกุล" name="ref_name" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 ">
                                    <label style="margin-bottom: 0px">ความสัมพันธ์</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="ความสัมพันธ์" name="ref_relation" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 space">
                                    <label style="margin-bottom: 0px">เบอร์โทรศัพท์</label>&nbsp<label style="color: red">*</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="ref_tel" class="form-control" style="border-radius:10px;"/>
                                </div>
                            </div>
                            <br>
                                <div class="text-center">
                                    <button class="btn btn-primary js-scroll-trigger" type="submit" style="font-size: 20px;background-color:#F98717;">สมัครสมาชิก</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>

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

            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
            );

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
                        regex:/[a-zA-Z0-9]/,
                        required: true,

                    },
                    password: {
                        regex:/^([A-Za-z0-9#?!@$%^&*-]).{5,}$/,
                      //  minlength: 6,
                        required: true,

                    },
                    confirm_password: {
                        equalTo: "#password",
                        required: true,

                    },
                    email: {
                        email: true,
                        required: true,

                    },
                    img_card: {
                        required: true

                    },
                    img_profile: {
                        required: true

                    },
                    tel: {
                        number:true,
                        rangelength: [9,10],
                        required: true,
                    },
                    place: {
                        required: true
                    },

                    ref_relation: {
                        required: true

                    },
                    ref_name: {
                        required: true

                    },
                    ref_tel: {
                        number:true,
                        rangelength: [9,10],
                        required: true,
                    },

                    gender: {
                        required: true
                    },

                    birthday: {
                        required: true
                    },

                    card_id: {
                        number:true,
                        minlength: 13,
                        required: true,
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
                        regex:"กรุณาใช้บัญชีผู้ใช้เป็นภาษาอังกฤษ a-z, A-Z หรือตัวเลข 0-9",
                        required: "กรุณากรอกชื่อผู้ใช้"

                    },
                    password: {
                        regex:"กรุณาใช้รหัสผ่านเป็นภาษาอังกฤษ a-z, A-Z, 0-9 และความยาวอย่างน้อย 6 ตัวอักษร",
                        required: "กรุณากรอกรหัสผ่าน",
                      //  minlength: "รหัสผ่านต้องมีอย่างน้อย 6 ตัว"
                    },
                    confirm_password: {
                        required: "กรุณายืนยันรหัสผ่าน",
                        equalTo: "รหัสผ่านไม่ตรงกัน"
                    },
                    email: {
                        required: "กรุณากรอกอีเมล์",
                        email: "กรุณากรอกอีเมล์ให้ถูกต้อง"
                    },

                    img_profile: "กรุณาเลือกรูปโปรไฟล์",

                    img_card: "กรุณาเลือกรูปบัตรประชาชน",

                    tel: {
                        number:"กรุณากรอกเป็นตัวเลข",
                        required: "กรุณากรอกเบอร์โทรศัพท์",
                        rangelength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",

                    },

                    card_id: {
                        number:"กรุณากรอกตัวเลข",
                        required: "กรุณากรอกเลขบัตรประชาชน",
                        minlength: "กรุณากรอกเลขบัตรประชาชนให้ครบ 13 หลัก",

                    },

                    place: "กรุณากรอกที่อยู่",
                    ref_relation: "กรุณากรอกความสัมพันธ์กับบุคคลอ้างอิง",
                    ref_name: "กรุณากรอกชื่อบุคคลอ้างอิง",

                    ref_tel: {
                        required: "กรุณากรอกเบอร์โทรศัพท์",
                        rangelength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
                        number:"กรุณากรอกเป็นตัวเลข"
                    },
                    gender: "กรุณาระบุเพศ",
                    birthday: "กรุณาระบุวันเดือนปีเกิด",

                    firstname: "กรุณากรอกชื่อจริง",

                    lastname: "กรุณากรอกนามสกุล",

                    role: "กรุณาระบุประเภทผู้ใช้"
                }
            });

            $('input[name="birthday"]').change(function(){
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


   
    
   