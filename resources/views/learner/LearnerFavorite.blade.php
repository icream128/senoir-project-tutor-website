@extends('layouts.learnerheader')

<style>
    div h5 {
        font-size:15px;
    }

    .padding-div{
        padding-bottom:15px;

    }

</style>
@section('content')
    <section class="text-center">   
        <h1>คอร์สปักหมุด</h1>
        <center><hr></center>      
    </section>

    <div class="container" style="background-color:#D8D8D8">
        <div class="row padding-div">
            <div class="col-lg-4 col-md-8 text-center" style="padding-bottom=10px;">
                <div class="service-box">              
                    <div class="container">   
                        <img src="img/17545230_1657098020972827_6332980447632524496_o.jpg" class="img-circle img-responsive" 
                        style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="150" height="150"> 
                    </div>
                </div>
            </div>

            <div class="col-lg-1 col-md-11 text-right">
                <div class="service-box">              
                <h5>ชื่อ :</h5>
                <h5>วิชา :</h5>
                <h5>วัน :</h5>
                <h5>เวลาเริ่ม :</h5>
                <h5>สถานที่ :</h5>
                <h5>สถานะ :</h5>              
                </div>
            </div>

            <div class="col-lg-6 col-md-6 text-left">
                <div class="service-box">              
                <h5>ชวิศา ใช้สิทธิชัย</h5>
                <h5>คณิตศาสตร์</h5>
                <h5>ทุกวัน</h5>
                <h5>12:00</h5>
                <h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>
                <h5>รอการยืนยัน</h5>              
                </div>
            </div>

            <div class="col-lg-1 col-md-11 text-left">
                <div class="service-box">              

                </div>
            </div>

        </div>          
    </div>



@endsection
