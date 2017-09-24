@extends('layouts.tutorheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    div h5 {
        font-size:17px;
    }

    .pad{
        padding-bottom:15px;
    }

    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
            padding-left: 0px;
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

    <section id="services" class="text-center">   
        <h1>สมัครสมาชิก</h1>
        <center><hr></center>      
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-10">
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
                                        <div style="margin-top:20px;">
                                            <img src="" id="blah1" alt="" width="300px" height="300px" class="img-circle" >
                                            <input type="file" id="imgInp_profile" name="img_profile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 marginnaja">
                                    <div class="row">
                                        <label>ชื่อผู้ใช้</label>
                                        <input placeholder="ชื่อผู้ใช้" name="username" class="form-control" style="border-radius:10px;"/>
                                    </div>
                                    <div class="row">
                                        <label>อีเมล</label>
                                        <input placeholder="อีเมล" name="email"  class="form-control" style="border-radius:10px;"/>
                                    </div>
                                    <div class="row">
                                        <label>รหัสผ่าน</label>
                                        <input placeholder="รหัสผ่าน" name="password" id="password"  class="form-control" type="password" style="border-radius:10px;"/>
                                    </div>
                                    <div class="row">
                                        <label>ยืนยันรหัสผ่าน </label>
                                        <input placeholder="ยืนยันรหัสผ่าน" name="confirm_password"  class="form-control" type="password" style="border-radius:10px;"/>
                                    </div>
                                    <div class="row">
                                        <label>ประเภท</label>
                                        <div class="col-md-1" style="margin-top:26px;">
                                            <input type="radio" value="tutor" name="type"/>                    
                                        </div>
                                        <div class="col-md-3" style="margin-top:20px;">        
                                            <p>ติวเตอร์</p>
                                        </div>
                                        <div class="col-md-1" style="margin-top:26px;">
                                            <input type="radio" value="learner" name="type"/>                  
                                        </div>
                                        <div class="col-md-3" style="margin-top:20px;">        
                                            <p>ผู้เรียน</p>
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
                                    <label>เลขบัตรประชาชาน</label>
                                    <input type="text" placeholder="เลขบัตรประชาชาน" name="id_card"  class="form-control" style="border-radius:10px;"/>
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
                                                <div class="col-md-3">
                                                    <label>รูปบัตรประชาขน</label>
                                                </div>
                                                <div class="col-md-3" style="margin-top:20px;">
                                                    <img src="" id="blah2" alt="" width="ึ80px" height="100px" >
                                                    <input type="file" id="imgInp_card" name="img_card">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-6 marginnaja">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="tel"  class="form-control" style="border-radius:10px;"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>ที่อยู่ปัจจุบัน</label>
                                    <textarea placeholder="ที่อยู่ปัจจุบัน" rows="4" cols="50" name="address" form="usrform" class="form-control"
                                                style="border-radius:10px;"></textarea>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>สถานศึกษาปัจจุบัน</label>
                                    <input type="text" placeholder="สถานศึกษาปัจจุบัน" name="school" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
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
                                <div class="col-md-12 marginnaja"><h2>บุคคลอ้างอิงที่ติดต่อได้</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" placeholder="ชื่อจริง-นามสกุล" name="reference" class="form-control" style="border-radius:10px;"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>ความสัมพันธ์</label>
                                    <input type="text" placeholder="ความสัมพันธ์" name="ref_relation" class="form-control" style="border-radius:10px;"/>
                                </div>
                                <div class="col-md-6 marginnaja tutor-only" style="display:none">
                                    <label>ประสบการณ์</label>
                                    <textarea placeholder="ประสบการณ์" rows="4" cols="50" name="exp" form="usrform" class="form-control"
                                                style="border-radius:10px;"></textarea>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="ref_tel" class="form-control" style="border-radius:10px;"/>
                                </div>
                            </div>
                            <br><br>
                            <button class="btn btn-primary js-scroll-trigger" type="submit" style="font-size: 17px;">สมัครสมาชิก</button>
                                <button class="btn btn-primary js-scroll-trigger" type="submit" style="font-size: 17px;">ยกเลิก</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-1"></div>
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
        <strong>Email: </strong><span class="email"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-primary">edit</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{url('script/jquery-validation-1.17.0/dist/jquery.validate.js')}}"></script>
<script>
$.validator.setDefaults({
    submitHandler: function(form){
        submitForm(form.id);
    }
})
$(document).ready(function(){

    $('input[name="type"]').click(function(){
        if($(this).val() == 'tutor'){
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
                required: true,
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
                email: true
            },
            
        },
        messages: {
        
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",		
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
 })
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
                            max: e.total,
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
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL2(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection

