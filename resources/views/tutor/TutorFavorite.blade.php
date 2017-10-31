@extends('layouts.tutorheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">

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
</style>


@section('content')

    <br>
    
    <div class=" co-md-12 text-center">
        <h1>คอร์สที่สนใจ</h1>
        <center><hr class="btn-tutor"></center>      
    </div>

   
    <!-- Table -->
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
         
          <table class="table" id="datatable-fav">
            <thead style="background-color:#FF8000;color:#ffffff;">
              <th><h5>ชื่อวิชา</h5></th>
              <th><h5>ระดับชั้น</h5></th>
              <th><h5>วัน</h5></th>
              <th><h5>เวลา</h5></th>
              
              <th></th>
              
            </thead>

            <tbody id="data-table-block">
              @foreach($learnerSchedule as $key =>$value)
                <tr class="data-table">
                    <td><h5 class="subject_name">{{$value->subject_name}}</h5></td>
                    <td><h5 class="level_name">{{$value->level_name}}</h5></td>
                    <td><h5 class="day_name">{{$value->day_name}}</h5></td>
                    <td><h5 class="duration_name">{{$value->duration_name}}</h5></td>
                    <td><a class="btn btn-tutor" style="font-size:12px;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a></td>

                </tr>
                
                <!-- Modal Popup -->
                <div id="{{$key}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity" style="padding:35px 35px;">
                        <header class="w3-container w3-teal"> 
<span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright"
      style="background-color:#f05f40;color: white;font-weight: bold">X</span>
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
                                        <h5>--</h5>
                                        <h5>ทุ่งครุ ทุ่งครุ กรุงเทพ 10140</h5>
                                        <h5>--</h5>
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
                    {{ $learnerSchedule->appends(['sort' => 'subject_name'])->links('vendor.pagination.custom') }}
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
@endsection
        
    @section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>


    <script src="js/jquery.dataTables.js"></script>

    <script src="js/dataTables.bootstrap4.js"></script>

    <script src="js/creative.min.js"></script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#datatable-fav').dataTable( {
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ คอร์ส ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลคอร์สที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ คอร์ส",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากคอร์สทั้งหมด _MAX_ คอร์ส)",
                    "sSearch": "ค้นหา :",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sLast": "หน้าสุดท้าย",
                        "sNext": "ถัดไป",
                        "sPrevious": "กลับ"
                    }
                }
            } );
        } );
    </script>

@endsection