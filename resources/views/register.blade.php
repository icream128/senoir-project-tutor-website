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

    .margin-naja {
        margin-top:10px;
    }
    .img-circle {
    border-radius: 50%;
}

     #nickname-error,#firstname-error,#tel-error
     ,#school-error,#level-error,#grade-error,#ref_relation-error,#ref_name-error
     ,#card_id-error,#role-error,#address-error
     ,#ref_tel-error,#gender-error ,#birthday-error
     ,#lastname-error,#imgInp_card-error, #email-error ,#username-error,#confirm_password-error
     ,#password-error,#lastname-error,#imgInp_profile-error, #email-error
     ,#username-error,#confirm_password-error,#password-error {
         font-size:13px;
         color:#ff0000;
     }

</style>

@section('content')

    <section id="services" class="text-center">   
        <h1>สมัครสมาชิก</h1>
        <center><hr></center>      
    </section>
    
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="container">
                    <div class="row" style="margin:5px">
                        <form action="{{ url('/registersave')}}" method='post' enctype="multipart/form-data" id="registerform">
                            {{ csrf_field() }}
                            <!-- Username and Password -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;">
                                <div class="col-md-12"><h2>บัญชีผู้ใช้</h2></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label>รูปโปรไฟล์</label>
                                        <div style="margin-top:20px;" class="text-center">
                                            <img src="" id="blah1" alt="" width="300px" height="300px" class="img-circle" >
                                            <input type="file" id="imgInp_profile" name="img_profile" style="margin-top: 8px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 margin-naja">
                                    <div class="row">
                                        <label>ชื่อสำหรับเข้าสู่ระบบ</label>
                                        <input placeholder="ชื่อสำหรับเข้าสู่ระบบ" name="username" class="form-control" style="border-radius:10px;"/>
                                    </div>
                                    <div class="row">
                                        <label>อีเมล</label>
                                        <input placeholder="อีเมล" name="email"  class="form-control" style="border-radius:10px;"/>
                                    </div>
                                    <div class="row">
                                        <label>รหัสผ่าน</label>
                                        <input placeholder="รหัสผ่าน" name="password" id="password"  class="form-control" type="password" style="border-radius:10px;"/>
                                        <label style="font-size: 11px;color:#ff0000 ">*ความยาวอย่างน้อย 6 ตัวอักษร</label>
                                    </div>
                                    <div class="row">
                                        <label>ยืนยันรหัสผ่าน </label>
                                        <input placeholder="ยืนยันรหัสผ่าน" name="confirm_password"  class="form-control" type="password" style="border-radius:10px;"/>
                                    </div>
                                    <div class="row">
                                        <label>ประเภท</label>
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
                                    </div>
                                </div>
                            </div>
                            
                            <br>

                            <!-- Profile -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;">
                                <div class="col-md-12 marginnaja"><h2>ข้อมูลส่วนตัว</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อจริง</label>
                                    <input type="text" placeholder="ชื่อจริง" name="firstname"  class="form-control" style="border-radius:10px;"/>
                                </div>
                            
                                <div class="col-md-6 marginnaja">
                                    <label>นามสกุล</label>
                                    <input type="text" placeholder="นามสกุล" name="lastname"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อเล่น</label>
                                    <input type="text" placeholder="ชื่อเล่น" name="nickname"  class="form-control" style="border-radius:10px;"/> 
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>เลขบัตรประชาชน</label>
                                    <input type="text" placeholder="เลขบัตรประชาชาน" name="card_id"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>วันเดือนปีเกิด</label>
                                    <input type="date" name="birthday"  class="form-control" style="border-radius:10px;"/>  
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>อายุ</label>
                                    <input type="text" placeholder="อายุ" name="age"  class="form-control" style="border-radius:10px;"/>   

                                </div>

                                <div class="container marginnaja">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                
                                                <div class="col-md-2">
                                                        <label>เพศ</label>
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
                                        </div>
                                
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>รูปบัตรประชาชน</label>
                                                </div>
                                                <div class="col-md-3" style="margin-top:20px;">
                                                    <img src="" id="blah2" alt="" width="ึ80px" height="100px" >

                                                </div>
                                                <div class="col-md-5" style="margin-top:20px;">
                                                    <input type="file" id="imgInp_card" name="img_card">
                                                </div>
                                            </div>
                                            <label style="font-size: 12px;color:#868e96;margin-top:5px; ">กรุณาแนบรูปบัตรประชาชนให้ตรงกับข้อมูลที่กรอก เพื่อใช้ในการตรวจสอบความถูกต้องของข้อมูล</label>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-6 marginnaja">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="tel"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>ที่อยู่ปัจจุบัน</label>
                                    <textarea name="address" id="address" placeholder="ที่อยู่ปัจจุบัน" rows="4" cols="50"
                                              form="usrform" class="form-control"
                                              style="border-radius:10px"></textarea>
                                </div>
                                
                                <div class="col-md-6 margin-naja">
                                    <label>สถานศึกษาปัจจุบัน</label>
                                    <input type="text" placeholder="สถานศึกษาปัจจุบัน" name="school" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 margin-naja">
                                    <label>ระดับชั้น</label>
                                    <input type="text" placeholder="ระดับชั้นที่กำลังศึกษา" name="level" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>เกรดเฉลี่ยสะสม</label>
                                    <input type="text" placeholder="เกรดเฉลี่ยสะสม" name="grade" class="form-control" style="border-radius:10px;"/>
                                </div>
                            </div>

                            <br>
                            
                            <!-- Reference -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;">
                                <div class="col-md-12 margin-naja"><h2>บุคคลอ้างอิงที่ติดต่อได้</h2></div>
                                <div class="col-md-6 margin-naja">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" placeholder="ชื่อจริง-นามสกุล" name="ref_name" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 margin-naja">
                                    <label>ความสัมพันธ์</label>
                                    <input type="text" placeholder="ความสัมพันธ์" name="ref_relation" class="form-control" style="border-radius:10px;"/>
                                </div>
                                <div class="col-md-6 margin-naja tutor-only" style="display:none">
                                    <label>ประสบการณ์</label>
                                    <textarea placeholder="ประสบการณ์" rows="4" cols="50" name="experience" form="usrform" class="form-control"
                                                style="border-radius:10px;"></textarea>
                                </div>
                                
                                <div class="col-md-6 margin-naja">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="ref_tel" class="form-control" style="border-radius:10px;"/>
                                </div>
                            </div>
                            <br>
                                <div class="text-center">
                                    <button class="btn btn-primary js-scroll-trigger" type="submit" style="font-size: 17px;">สมัครสมาชิก</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br>

    <!-- Plugin JavaScript -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <strong>ชื่อ: </strong><span class="name"></span><br>
        <strong>อีเมล: </strong><span class="email"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
        <button type="button" class="btn btn-primary">แก้ไข</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
        <script src="{{url('/script/jquery-validation-1.17.0/dist/jquery.validate.js')}}"></script>

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
                // if(now>=birthday){
                //     // alert(now.getFullYear() - born.getFullYear());
                //     $('input[name="age"]').val(now.getFullYear() - born.getFullYear())
                // }else{
                //     $('input[name="birthday"]').val('');

                // }
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


   
    
   