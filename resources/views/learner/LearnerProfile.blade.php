@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    div h5 {
        font-size:15px;
    }

    .navbar-hight{
        higth:50px;
    }

    .pad{
        padding-bottom:15px;
    }
    


</style>

@section('content')
    <section class="text-center">   
        <h1>ประวัติส่วนตัว</h1>
        <center><hr></center>      
    </section>
    <form action="{{ url('/learnereditprofile')}}" method='post' enctype="multipart/form-data">    
            {{ csrf_field() }}
    <div class="container">
        <div class="row">
        <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit" style="font-size: 17px;">แก้ไขโปรไฟล์</button>
            <div class="col-md-4 text-center">
                <img border="0" src="img/17545230_1657098020972827_6332980447632524496_o.jpg" class="img-circle img-responsive" 
                    style="border-radius:50%;object-position:center;object-fit: cover; margin-left:10px;margin-bottom:10px" alt="Cinque Terre" width="300px" height="300px">
            </div>
            <div class="col-md-2 text-right">
                <p>ชื่อ :</p>
                <p>ชื่อเล่น :</p>
                <p>สถานศึกษา :</p>
                <p>ระดับชั้น :</p>
                <p>ประสบการณ์สอน :</p>
                <p>อายุ :</p>
                <p>เพศ :</p>
            </div>
            <div class="col-md-2 text-left">
                <p>{{$learnerProfile->name}}</p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
            
            <div class="col-md-2 text-right">
                <p>นามสกุล :</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>เกรดเฉลี่ยสะสม :</p>
            </div>
            <div class="col-md-2 text-left">
                <p>ใช้สิทธิชัย</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p></p>
            </div>
            
        </div>
    </div>

</form>

        

        
@endsection
