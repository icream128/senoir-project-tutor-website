@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="css/paginationlearner.css">

<style>
    div h5 {
        font-size:15px;
    }

    .pad{
        padding-bottom:15px;
    }


</style>

@section('content')
<br>
<section class="text-center">   
    <h1>สถานะคอร์ส</h1>
    <center><hr></center>      
</section>

    <!-- Table -->
    <div class="container">
    <div class="row" id="result">
      <div class="col-md-1"></div>
      <div class="col-md-10 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
       
        <table class="table" id="datatable">
            <thead style="background-color:#f05f40;color:#ffffff;">
                <th><h3>ชื่อวิชา</h3></th>
                <th><h3>ระดับชั้น</h3></th>
                <th><h3>วัน</h3></th>
                <th><h3>เวลา</h3></th>
                <th></th>
                
            </thead>

            <tbody id="data-table-block">
                @foreach($learnerSchedule as $key =>$value)
                <tr class="data-table">
                    <td><h4 class="subject_name">{{$value->subject_name}}</h4></td>
                    <td><h4 class="level_name">{{$value->level_name}}</h4></a></td>
                    <td><h4 class="day_name_full">{{$value->day_name_full}}</h4></a></td>
                    <td><h4 class="duration_name">{{$value->duration_name}}</h4></a></td>
                    <td><a class="btn btn-primary" style="font-size:12px;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a></td>
                    <!-- <td><a href=""><h4 class="district"></h4></a></td>
                    <td><a href=""><h4 class="amphoe"></h4></a></td>
                    <td><a href=""><h4 class="province"></h4></a></td>
                    <td><a href=""><h4 class="zipcode"></h4></a></td> -->
                </tr>
                
                <!-- Modal Popup -->
                <div id="{{$key}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity" style="padding:35px 35px;">
                        <header class="w3-container w3-teal"> 
                            <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright" style="background-color:#f05f40;">&times;</span>
                        </header>
                        <div class="w3-container">
                            <div class="container">
                                <div class="row">        
                                    <div class="col-lg-3 col-md-8 text-center" style="padding-bottom=10px;">
                                        <div class="service-box">              
                                            <div class="container">   
                                                <img src="{{$value->img_profile}}" class="img-circle img-responsive" 
                                                    style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="150" height="150"> 
                                            </div>
                                        </div>
                                    </div>
                                    <br>        
                                    <div class="col-lg-3 col-md-8 text-right">
                                        <div class="service-box">             
                                            <h5>ชื่อ :</h5>
                                            <h5>วิชา :</h5>
                                            <h5>วัน :</h5>
                                            <h5>เวลาเริ่ม :</h5>
                                            <h5>สถานที่ :</h5>
                                            <h5>ราคา/ชั่วโมง :</h5>
                                            <h5>สถานะ :</h5>
                                            <h5>ติดต่อ :</h5>
                                            <h5>รายละเอียดการสอน :</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">
                                        <div class="service-box">              
                                            <h5>{{$value->firstname}} {{$value->lastname}}</h5>
                                            <h5>{{$value->subject_name}}</h5>
                                            <h5>{{$value->day_name}}</h5>
                                            <h5>{{date('H:i', strtotime($value->start_time))}}</h5>
                                            <h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>
                                            <h5>{{$value->price}}</h5>
                                            <h5>{{$value->status_name}}</h5>
                                            <h5>{{$value->tel}}</h5>    
                                            <h5>อยากให้มีข้อสอบตัวอย่างมาให้ฝึกทำด้วย</h5><br>         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
                @endforeach
            </tbody>            
        </table>
        

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{ $agreement->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>

      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
@endsection