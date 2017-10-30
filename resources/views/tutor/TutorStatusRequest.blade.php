@extends('layouts.tutorheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- <link rel="stylesheet" href="css/paginationtutor.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" href="js/Datatables-1.10.15/media/css/dataTables.bootstrap4.css">


<style>
    .h4 h4 {
        font-size: 1.5rem;
    }
    

    div h5 {
        font-size:17px;
    }
    .btn-tutor {
        color: #fff;
        border-color: #FF8000;
        background-color: #FF8000;
    }
    .btn-approved {
        color: #fff;
        border-color: limegreen;
        background-color: limegreen;
    }
    .btn-other-approved {
        color: #fff;
        border-color: indianred;
        background-color: indianred;
    }
</style>


@section('content')
    
    <br><br><br><br><br>

    <section class="text-center">   
        <h1>สถานะการจองคอร์ส</h1>
        <center><hr class="btn-tutor"></center>      
    </section>

   
    <!-- Table -->
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
         
          <table class="table" id="datatable-statusrequest">
            <thead style="background-color:#FF8000;color:#ffffff;">
                <th><h4>ชื่อนักเรียน</h4></th>
                <th><h4>ชื่อวิชา</h4></th>
                <th><h4>ระดับชั้น</h4></th>
                <th><h4>วัน</h4></th>
                <th><h4>เวลา</h4></th>
                <th></th>
              
            </thead>

            <tbody id="data-table-block">
              @foreach($learnerSchedule as $key =>$value)
                <tr class="data-table">
                    <td><h5 class="name">{{$value->firstname}} {{$value->lastname}}</h5></td>
                    <td><h5 class="subject_name">{{$value->subject_name}}</h5></td>
                    <td><h5 class="level_name">{{$value->level_name}}</h5></td>
                    <td>
                        @foreach($value->learnerScheduleTime as $lst)
                            <h5 class="day_name">{{$lst->day_name}}</h5>
                        @endforeach
                    </td>
                    <td>
                        @foreach($value->learnerScheduleTime as $lst)
                            <h5 class="time">{{date('H:i', strtotime($lst->start_time))}}น. - {{date('H:i', strtotime($lst->end_time))}}น.</h5>
                        @endforeach
                    </td>
                    @if($value->approved_tutor == 0)
                        <td><center><a class="btn btn-tutor" style="font-size:12px;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a></center></td>
                    @elseif($value->approved_tutor == 1)
                        <td><center><a class="btn btn-approved" style="font-size:12px;" href="{{ url('') }}/tutormycourse">คำขอถูกอนุมัติ</a></center></td>
                    @else
                        <td><center><a class="btn btn-other-approved" style="font-size:12px;" href="#">คำขอถูกปฏิเสธ</a></center></td>
                    @endif
                  <!-- <td><a href=""><h5 class="district"></h5></a></td>
                  <td><a href=""><h5 class="amphoe"></h5></a></td>
                  <td><a href=""><h5 class="province"></h5></a></td>
                  <td><a href=""><h5 class="zipcode"></h5></a></td> -->
                </tr>

                <!-- Modal Popup -->
                <div id="{{$key}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity">
                        <header class="w3-container" style="background-color:#ffffff;">
                            <h3 style="color:#000000;margin:20px 40px">ข้อมูลนักเรียน</h3>
                            <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright" style="background-color:#f05f40;">&times;</span>
                        </header>
                        <div class="w3-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-8 text-center" style="padding-bottom=10px;">
                                        <div class="service-box">
                                            <div class="container">
                                                <a href="/tutorshortprofile&<?php echo $value->tutor_id ?>"><img src="{{$value->img_profile}}" class="img-circle img-responsive"
                                                                                                                 style="border-radius:50%;object-position:center;object-fit: cover;" alt="Cinque Terre" width="150" height="150"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-2 col-md-8 text-right">
                                        <div class="service-box">
                                            <h5>ชื่อ :</h5>
                                            <h5>วิชา :</h5>
                                            <h5>&nbsp</h5>
                                            <h5>วัน / เวลาเรียน :</h5>
                                            @foreach($value->learnerScheduleTime as $lst)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>&nbsp</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5>&nbsp</h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <h5>สถานที่ :</h5>
                                            <h5>ราคา/ชั่วโมง :</h5>
                                            <h5>ติดต่อ :</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 text-left" style="padding-left: 0px;">
                                        <div class="service-box">
                                            <h5>{{$value->firstname}} {{$value->lastname}}</h5>
                                            <h5>{{$value->subject_name}}</h5>
                                            <h5>&nbsp</h5>
                                            @foreach($value->learnerScheduleTime as $lst)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h5 class="day_name">{{$lst->day_name}}</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="time">{{date('H:i', strtotime($lst->start_time))}}น. - {{date('H:i', strtotime($lst->end_time))}}น.</h5>
                                                    </div>

                                                </div>
                                            @endforeach
                                            <h5>&nbsp</h5>
                                            <h5>{{ $value->location }}</h5>
                                            <h5>{{$value->price_per_hour}}</h5>
                                            <h5>{{$value->tel}}</h5><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
              @endforeach
            </tbody>            
            </table>

        </div>
      </div>
    </div>
        
    @section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    
    <script src="{{url('/js/Datatables-1.10.15/media/js/jquery.dataTables.js') }}"></script>

    <script src="{{url('/js/Datatables-1.10.15/media/js/dataTables.bootstrap4.js')}}"></script>

    <script src="{{url('/js/creative.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#datatable-statusrequest').DataTable();
        });
    </script>

@endsection

