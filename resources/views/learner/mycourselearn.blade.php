@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/rating.css">
<link rel="stylesheet" href="css/paginationtutor.css">

<style>
    div h5 {
        font-size:17px;
    }


</style>

@section('content')
    <br>

    <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6"></div>
          <div class="col-md-3">
            <a href="{{url('/learnercreatecourse')}}"><button class="tag-item btn btn-lg btn-danger" style="background-color: #f05f40;">สร้างคอร์สเรียนที่ต้องการ</button></a>
          </div>
        </div>
      <div>
          
    <section class="text-center">   
        <h1>คอร์สเรียนของฉัน</h1>
        <center><hr></center>      
    </section>

    <!-- Table -->
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
         
          <table class="table" id="datatable">
            <thead style="background-color:#f05f40;color:#ffffff;">
                <th><h3>ชื่อติวเตอร์</h3></th>
                <th><h3>ชื่อวิชา</h3></th>
                <th><h3>ระดับชั้น</h3></th>
                <th><h3>วัน</h3></th>
                <th><h3>เวลา</h3></th>
                <th><h3></h3></th>
            </thead> 

            <tbody id="data-table-block">
              @foreach($agreement as $key =>$value)
                <tr class="data-table">
                    <td><h4 class="tutor_name">{{$value->firstname}} {{$value->lastname}}</h4></td>
                    <td><h4 class="subject_name">{{$value->subject_name}}</h4></td>
                    <td><h4 class="level_name">{{$value->level_name}}</h4></a></td>
                    <td><h4 class="day_name">{{$value->day_name}}</h4></a></td>
                    <td><h4 class="duration_name">{{$value->duration_name}}</h4></a></td>
                    <td><a class="btn btn-primary" style="font-size:12px;" href="#" onclick="document.getElementById('detail-{{$key}}').style.display='block'">ดูรายละเอียด</a> <div id="detail-{{$key}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity">
                        <header class="w3-container" style="background-color:#ffffff;">
                            <h3 style="color:#000000;margin:20px 40px">ข้อมูลติวเตอร์</h3>
                            <span onclick="document.getElementById('detail-{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright" style="background-color:#f05f40;">&times;</span>
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
                                            <h5>ชื่อติวเตอร์ :</h5>
                                            <h5>วิชาที่สอน :</h5>
                                            <h5>ระดับชั้นที่สอน :</h5>
                                            <h5>วันที่สอน :</h5>
                                            <h5>วันที่เริ่มสอน :</h5>
                                            <h5>ช่วงเวลา :</h5>
                                            <h5>เวลาเริ่ม :</h5>
                                            <h5>เวลาจบ :</h5>
                                            <h5>สถานที่สอน :</h5>
                                            <h5>ราคา/ชั่วโมง :</h5>
                                            <h5>เบอร์โทรติดต่อ :</h5>
                                            <h5>รายละเอียดการสอน :</h5>
                                            <h5>รายละเอียดการเดินทาง :</h5>
                                            <h5>รายละเอียดสถานที่สอน :</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">
                                        <div class="service-box">              
                                            <h5>{{$value->firstname}} {{$value->lastname}}</h5>
                                            <h5>{{$value->subject_name}}</h5>
                                            <h5>{{$value->level_name}}</h5>
                                            <h5>{{$value->day_name}}</h5>
                                            <h5>{{$value->duration_name}}</h5>
                                            <h5>{{$value->start_course}}</h5>
                                            <h5>{{$value->start_time}}</h5>
                                            <h5>{{$value->end_time}}</h5>
                                            <h5>{{$value->location}}</h5>
                                            <h5>{{$value->price_per_hour}}</h5>
                                            <h5>{{$value->tel}}</h5>    
                                            <h5>{{$value->detail_lesson}}</h5>
                                            <h5>{{$value->detail_transport}}</h5>
                                            <h5>{{$value->detail_location}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <br><br>         
                    </div>
                </div>
           </td>
                    <td><a class="btn btn-primary" style="font-size:12px;" href="#" onclick="document.getElementById('data-{{$key}}').style.display='block'">การเรียนแต่ละครั้ง</a> <!-- Modal Popup -->
               
                <div id="data-{{$key}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity">
                        <header class="w3-container" style="background-color:#ffffff;">
                            <h3 style="color:#000000;margin:20px 40px">การสอนแต่ละครั้ง</h3>
                            <span onclick="document.getElementById('data-{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright" style="background-color:#f05f40;">&times;</span>
                        </header>
                        <div class="w3-container">
                            <div class="container">
                                <div class="row">        
                                    <div class="col-lg-3 col-md-8 text-center" style="padding-bottom=10px;">
                                        <div class="service-box">              
                                            <div class="container">   
                                                <table>
                                                    <thead style="background-color:#f05f40;color:#ffffff;">
                                                        <th><h3>วันที่เรียน</h3></th>
                                                        <th><h3>เวลาเริ่ม</h3></th>
                                                        <th><h3>เวลาจบ</h3></th>
                                                        <th><h3>ค่าสอน</h3></th>
                                                        <th><h3>คำวิจารณ์</h3></th>
                                                        <th><h3>รายละเอียดเพิ่มเติมในครั้งต่อไป</h3></th>
                                                        <th><h3>วันที่เรียนครั้งหน้า</h3></th>
                                                        <th><h3>คะแนนที่ได้</h3></th>
                                                        <th><h3></h3></th>
                                                    </thead> 

                                                    <tbody>
                                                        @foreach($agr[$value->agreement_id] as $data =>$val)
                                                            <tr class="data-table">
                                                                <td><h4 class="level_name">{{$val->study_date}}</h4></a></td>
                                                                <td><h4 class="day_name">{{$val->start_time}}</h4></a></td>
                                                                <td><h4 class="duration_name">{{$val->end_time}}</h4></a></td>
                                                                <td><h4 class="level_name">{{$val->price}}</h4></a></td>
                                                                <td><h4 class="level_name">{{$val->comment}}</h4></a></td>
                                                                <td><h4 class="level_name">{{$val->moredetail}}</h4></a></td>
                                                                <td><h4 class="level_name">{{$val->nextdeal}}</h4></a></td>
                                                                <td>
                                                                    <div class="stars">
                                                                        <input class="star star-5" id="{{ $data}}star-5" type="radio" name="{{ $data}}star" {{ $val->point == 5 ? "checked" : "" }} value="5"/>
                                                                        <label class="star star-5" for="{{ $data}}star-5"></label>
                                                                        <input class="star star-4" id="{{ $data}}star-4" type="radio" name="{{ $data}}star" {{ $val->point == 4 ? "checked" : "" }} value="4"/>
                                                                        <label class="star star-4" for="{{ $data}}star-4"></label>
                                                                        <input class="star star-3" id="{{ $data}}star-3" type="radio" name="{{ $data}}star" {{ $val->point == 3 ? "checked" : "" }} value="3"/>
                                                                        <label class="star star-3" for="{{ $data}}star-3"></label>
                                                                        <input class="star star-2" id="{{ $data}}star-2" type="radio" name="{{ $data}}star" {{ $val->point == 2 ? "checked" : "" }} value="2"/>
                                                                        <label class="star star-2" for="{{ $data}}star-2"></label>
                                                                        <input class="star star-1" id="{{ $data}}star-1" type="radio" name="{{ $data}}star" {{ $val->point == 1 ? "checked" : "" }} value="1"/>
                                                                        <label class="star star-1" for="{{ $data}}star-1"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <br>        
                                    <div class="col-lg-6 col-md-6 text-left" style="padding-left: 30px;">
                                                  
                                        <a class="btn btn-primary btn-xl js-scroll-trigger"style="font-size: 17px;" href="{{url('/classbegin&'.$value->agreement_id)}}">เรียน</a>
                                        <a class="btn btn-primary btn-xl js-scroll-trigger" style="font-size: 17px;" href="{{url('/cancelcourse&'.$value->agreement_id)}}">ยกเลิกคอร์ส</a> 
                                        <a class="btn btn-primary btn-xl js-scroll-trigger" style="font-size: 17px;" href="{{url('/endcourse&'.$value->agreement_id)}}">จบคอร์ส</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <br><br>         
                    </div>
                </div></td>

                 
                </tr>
                
               
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
      </div>
    </div>
        

        
@endsection
