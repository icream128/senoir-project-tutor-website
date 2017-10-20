@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="css/paginationtutor.css">

<style>
    div h5 {
        font-size:17px;
    }


</style>

@section('content')
    <br>
    
    <section class="text-center">   
        <h1>สถานะคอร์สที่ฉันสร้าง</h1>
        <center><hr></center>      
    </section>

    <!-- Table -->
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
         
            <table class="table" id="datatable">
            <thead style="background-color:#f05f40;color:#ffffff;">
                <th><h4>ชื่อวิชา</h4></th>
                <th><h4>ระดับชั้น</h4></th>
                <th><h4>วัน</h4></th>
                <th><h4>เวลา</h4></th>
                <th><h4></h4></th>
                
              
            </thead>

            <tbody id="data-table-block">
              @foreach($learnerSchedule as $key =>$value)
                <tr class="data-table">
                    <td><h5 class="subject_name">{{$value->subject_name}}</h5></td>
                    <td><h5 class="level_name">{{$value->level_name}}</h5></td>
                    <td colspan="2">
                    @foreach($value->learnerScheduleTime as $lst)
                        <div class="row">
                            <div class="col-md-6">
                                <span class="day_name">{{$lst->day_name}}</span>
                            </div>
                            <div class="col-md-6">
                                <span class="duration_name">{{$lst->duration_name}}</span>
                            </div>
                        </div>
                    @endforeach
                    </td>
                    <td><center><a class="btn btn-primary" style="font-size:12px;background-color:#778899;" href="/learnereditcourse&<?php echo $value->learner_schedule_id ?>">แก้ไขรายละเอียด</a>&nbsp;&nbsp;
                    <a class="btn btn-primary" style="font-size:12px;background-color:#FFA500;" href="{{url('/learnerdeal')}}">ตรวจสอบคำขอ</a>&nbsp;&nbsp;
                    <a class="btn btn-primary" style="font-size:12px;background-color:#FF0000;" href="{{url('/learnerdeal')}}">ลบคอร์สเรียน</a></center></td>

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
                                                <!-- image -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-3 col-md-8 text-right">
                                        <div class="service-box">
                                            <h5>วิชา :</h5>
                                            <h5>วัน :</h5>
                                            <h5>สถานที่ :</h5>
                                            <h5>สถานะ :</h5>
                                            <h5>ติดต่อ :</h5>
                                            <h5>รายละเอียดการสอน :</h5>
                                        </div>
                                    </div>

                                    {{--<div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">--}}
                                        {{--<div class="service-box">--}}
                                            {{--<h5>{{$value->subject_name}}</h5>--}}
                                            {{--<h5>{{$value->day_name}}</h5>--}}
                                            {{--<h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>--}}
                                            {{--<h5>{{$value->status_name}}</h5>--}}
                                            {{--<h5>{{$value->tel}}</h5>--}}
                                            {{--<h5>อยากให้มีข้อสอบตัวอย่างมาให้ฝึกทำด้วย</h5><br>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </tbody>            
          </table>

        </div>
      </div>
    </div>
    <br><br>
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function(){
            alert('{{ json_encode($learnerSchedule)  }}')
        });
    </script> -->
@endsection