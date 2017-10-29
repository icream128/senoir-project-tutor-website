@extends('layouts.learnerheader')

@section('content')
<head>
  <title>Comment</title>
  <link rel="stylesheet" href="css/rating.css">
</head>

<div class="container">

    <section class="text-center">   
        <h1>แสดงความคิดเห็น</h1>
        <center><hr></center>
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 text-center">
                <img border="0" class="img-circle img-responsive infinite pulse" 
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
                            <p>ระดับชั้น :</p>
                            <p>สถานศึกษา :</p>
                            <p>ประสบการณ์สอน :</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-12 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 text-right">
                            <br>
                            <p>นามสกุล :</p>
                            <p>อายุ :</p>
                            <p>&nbsp</p>
                            <p>เกรดเฉลี่ย :</p>
                        </div>
                        <div class="col-md-6 col-sm-6 text-left">
                            <br>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <br>
            <center>
                <form>

                <!-- rating -->
                <div class="stars">
                    <form action="">
                        <input class="star star-5" id="star-5" type="radio" name="star"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star"/>
                        <label class="star star-1" for="star-1"></label>
                    </form>
                </div>

                <!-- input comment -->
                <div class="form-group">
                    <h4 for="comment">ความคิดเห็น</h4>
                    <center><textarea name="comment" id="comment" cols="50" rows="5"
                                maxlength="300" style="border-radius:5px;"></textarea></center>
                </div>
                </form>
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
            <center><h4 class="modal-title">ตรวจสอบข้อมูล</h4></center>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
            <!-- Body Popup -->
            <div class="modal-body">
                <br>
                <center><img src = "img/mena.jpg" class="img-circle" alt="Cinque Terre" width= "200" height="200"/></center>
                <br>
                <center>
                    <form class="text-left" style="padding-left: 50px;">
                        <!-- Name -->
                        <h5 id="name">Thammatorn Kangwanwong </h5>
                        

                        <!-- Subject -->
                        <h5>วิชา: Programming</h5>
                        <h5>ระดับชั้น: Programming</h5>
                        <h5>สถานที่: Programming</h5>
                        </form>
                        <!-- rating -->
                        <div class="stars">
                            <form action="">
                                <input class="star star-5" id="star-5" type="radio" name="star"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star"/>
                                <label class="star star-1" for="star-1"></label>
                            </form>
                        </div>

                        <!-- input comment -->
                        <div class="form-group">
                            <h4 for="comment">ความคิดเห็น</h4>
                            <center><textarea name="comment" id="comment" cols="50" rows="5"
                                        maxlength="300" style="border-radius:5px;"></textarea></center>
                        </div>
                    
                </center>
            </div>


            <div class="modal-footer">
                <center><button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="background-color:#f05f40;
                        border-color:#f05f40;" >ยืนยัน</button></center>
            </div>
        </div>
        
        </div>
    </div>

  <br><br><br>
@endsection