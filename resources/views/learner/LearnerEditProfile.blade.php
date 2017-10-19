@extends('layouts.learnerheader')

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
    <br>
    <section id="services" class="text-center">   
        <h1>แก้ไขข้อมูลส่วนตัว</h1>
        <center><hr></center>      
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-10">
                <div class="container">
                    <div class="row" style="margin:5px">
                        <form method='post' action="/updated&<?php echo $learnerProfile->user_id ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            
                            <!-- Username and Password -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;padding-bottom:30px">
                                <div class="col-md-12 marginnaja"><h2>บัญชีผู้ใช้</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <div class="row">
                                        <center>
                                            <label>รูปโปรไฟล์</label>
                                            <div style="margin-top:20px;">
                                                <img src="" id="blah1" alt="" width="300px" height="300px" class="img-circle" value="{{$learnerProfile->img_profile}}">
                                                <input type="file" id="imgInp_profile" name="img_profile" >
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6 marginnaja">
                                    <br>
                                    <div class="marginnaja">
                                        <label>ชื่อผู้ใช้</label>
                                        <input placeholder="ชื่อผู้ใช้" name="username" class="form-control" style="border-radius:10px;" value="{{$learnerProfile->username}}" readonly="readonly"/>
                                    </div>
                                    <div class="marginnaja">
                                        <label>อีเมล</label>
                                        <input placeholder="อีเมล" name="email"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->email}}"/>
                                    </div>
                                    <div class="marginnaja">
                                        <label>รหัสผ่าน</label>
                                        <input placeholder="รหัสผ่าน" name="password" id="password"  class="form-control" type="password" style="border-radius:10px;"/>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <br>

                            <!-- Profile -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;padding-bottom:30px">
                                <div class="col-md-12 marginnaja"><h2>ข้อมูลส่วนตัว</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อจริง</label>
                                    <input type="text" placeholder="ชื่อจริง" name="firstname"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->firstname}}"/>
                                </div>
                            
                                <div class="col-md-6 marginnaja">
                                    <label>นามสกุล</label>
                                    <input type="text" placeholder="นามสกุล" name="lastname"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->lastname}}"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อเล่น</label>
                                    <input type="text" placeholder="ชื่อเล่น" name="nickname"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->nickname}}"/> 
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>เลขบัตรประชาชน</label>
                                    <input type="text" placeholder="เลขบัตรประชาชน" name="card_id"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->card_id}}" readonly="readonly"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>วันเดือนปีเกิด</label>
                                    <input type="date" name="birthday"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->birthday}}"/>  
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>อายุ</label>
                                    <input type="text" placeholder="อายุ" name="age"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->age}}"/>   

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
                                                    <label>รูปบัตรประชาชน</label>
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
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="tel"  class="form-control" style="border-radius:10px;" value="{{$learnerProfile->tel}}"/>
                                </div>

                                <div class="col-md-6 marginnaja">
                                    <label>ที่อยู่ปัจจุบัน</label>
                                    <textarea placeholder="ที่อยู่ปัจจุบัน" rows="4" cols="50" id="address" name="address" class="form-control"
                                                style="border-radius:10px;" >{{$learnerProfile->address}}</textarea>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>สถานศึกษาปัจจุบัน</label>
                                    <input type="text" placeholder="สถานศึกษาปัจจุบัน" name="school" class="form-control" style="border-radius:10px;" value="{{$learnerProfile->school}}"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>ระดับชั้น</label>
                                    <input type="text" placeholder="ระดับชั้นที่กำลังศึกษา" name="level" class="form-control" style="border-radius:10px;" value="{{$learnerProfile->level}}"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>เกรดเฉลี่ยสะสม</label>
                                    <input type="text" placeholder="เกรดเฉลี่ยสะสม" name="grade" class="form-control" style="border-radius:10px;" value="{{$learnerProfile->grade}}"/>
                                </div>
                            </div>

                            <br>
                            
                            <!-- Reference -->
                            <div class="row" style="background-color:#D8D8D8;border-radius:25px;padding:20px;padding-bottom:30px">
                                <div class="col-md-12 marginnaja"><h2>บุคคลอ้างอิงที่ติดต่อได้</h2></div>
                                <div class="col-md-6 marginnaja">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" placeholder="ชื่อจริง-นามสกุล" name="ref_name" class="form-control" style="border-radius:10px;" value="{{$learnerProfile->ref_name}}"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>ความสัมพันธ์</label>
                                    <input type="text" placeholder="ความสัมพันธ์" name="ref_relation" class="form-control" style="border-radius:10px;" value="{{$learnerProfile->ref_relation}}"/>
                                </div>
                                
                                <div class="col-md-6 marginnaja">
                                    <label>เบอร์โทรศัพท์</label>
                                    <input type="text" placeholder="เบอร์โทรศัพท์" name="ref_tel" class="form-control" style="border-radius:10px;" value="{{$learnerProfile->ref_tel}}"/>
                                </div>
                            </div>
                            <br><br>
                            <center>
                                <input type="submit" class="btn btn-tutor btn-xl js-scroll-trigger" style="font-size: 20px;background-color: #f05f40;color: #ffffff;" name="update" value="Update"/>
                            </center>
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