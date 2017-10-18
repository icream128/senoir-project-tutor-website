@extends('layouts.learnerheader')
<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
  .search-input{
    max-width:500px;
    margin-top:50px;
    margin-bottom:50px;
    margin-right:10px

  }


.rows {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: 0px;
    margin-left: 0px;
  }
.btn-tutor {
    color: #fff;
    border-color: #FF8000;
    background-color: #FF8000;
}
</style>
@section('content')
  <br>

    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"></div>
        <div class="col-md-3">
          <a href=""><button class="tag-item btn btn-lg btn-danger" style="background-color: #FF8000;">สร้างคอร์สเรียนที่ต้องการ</button></a> 
        </div>
      </div>
    <div>

    <!-- Modal popup -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" style="center">แจ้งเตือน</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
          </div>
          <div class="modal-body">
            ไม่พบติวเตอร์ที่ตรงกับความต้องการของผู้ใช้
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary btn-xl " href="{{url('/learnercreatecourse')}}" style="background-color: #FF8000;">เพิ่มคอร์สสอน</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <section class="text-center" style="padding-bottom: 0px;">   
      <h1>ค้นหาคอร์ส</h1>
      <center><hr class="btn-tutor"></center>      
    </section>  

    <div class="container">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;margin-top:35px">
      <!-- first line -->  
      <div class="container">  
        <div class="filter-select row">

          <div class="col-md-3">
            <label>ชื่อวิชา</label>
            <select id="filterBySubject" class="form-control" style="padding: 5px;">
              <?php
                foreach($subject as $key =>$value){
                  echo '<option value="'.$value->subject_id.'">'.$value->subject_name.'</option>' ;
                }			
              ?>
            </select>
          </div>
                    
          <div class="col-md-3">
            <label>ระดับชั้น</label>
            <select id="filterByLevel"  class="form-control" style="padding: 5px;">
              <?php
                foreach($level as $key =>$value){
                  echo '<option value="'.$value->level_id.'">'.$value->level_name.'</option>' ;
                }			
              ?>
            </select>
          </div>
                        
          <div class="col-md-3">
            <label>วัน</label>
            <select id="filterByDay"  class="form-control" style="padding: 5px;">                       
              <?php
                foreach($day as $key =>$value){
                  echo '<option value="'.$value->day_id.'">'.$value->day_name.'</option>' ;
                }			
              ?>
            </select>
          </div>
                        
          <div class="col-md-3">
            <label>ช่วงเวลา</label>   
            <select id="filterByDuration"  class="form-control" style="padding: 5px;">
              <?php
                foreach($duration as $key =>$value){
                  echo '<option value="'.$value->duration_id.'">'.$value->duration_name.'</option>' ;
                }			
              ?>
            </select>
          </div>
          
        </div>
      </div>
      <!-- End first line -->
                  
      <!-- second line -->  
      <!-- <div class="container">
        <div class="row">

          <div class="col-md-3">
            <label>แขวง</label>
            <input type="text" id="district" class="form-control">
          </div>
                  
          <div class="col-md-3">
            <label>เขต</label>
            <input type="text" id="amphoe" class="form-control">
          </div>
                  
          <div class="col-md-3">
            <label>จังหวัด</label>
            <input type="text" id="province" class="form-control">
          </div>
                  
          <div class="col-md-3">
            <label>รหัสไปรษณีย์</label>
            <input type="text" id="zipcode" class="form-control">
          </div>

        </div>
      </div> -->
      <!-- End second line -->
    </div>
    <div class="col-md-1"></div>

    <br>          
    <div id="tagGroup"></div>
        
    <!-- Table -->
    <div class="container">
      <div class="row" id="result">
        <div class="col-md-1"></div>
        <div class="col-md-10 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
         
          <table class="table" id="datatable">
            <thead style="background-color:#FF8000;color:#ffffff;">
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
                  <td><h4 class="dayfull">{{$value->day_name}}</h4></a></td>
                  <td><h4 class="duration_name">{{$value->duration_name}}</h4></a></td>
                  <td><a class="btn btn-tutor" style="font-size:12px;" href="#" onclick="document.getElementById('{{$key}}').style.display='block'">ดูรายละเอียด</a></td>
                
                  <!-- <td><a href=""><h4 class="district"></h4></a></td>
                  <td><a href=""><h4 class="amphoe"></h4></a></td>
                  <td><a href=""><h4 class="province"></h4></a></td>
                  <td><a href=""><h4 class="zipcode"></h4></a></td> -->
                </tr>
                
                <!-- Modal Popup -->
                <div id="{{$key}}" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity" style="padding:35px 35px;">
                        <header class="w3-container w3-teal"> 
                            <span onclick="document.getElementById('{{$key}}').style.display='none'" class="btn-tutor w3-button w3-display-topright">&times;</span>
                        </header>
                        <div class="w3-container">
                            <div class="container">
                                <div class="row">        
                                    <div class="col-lg-3 col-md-8 text-center" style="padding-bottom=10px;">
                                        <div class="service-box">              
                                            <div class="container">   
                                               
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
                  {{ $learnerSchedule->appends(['sort' => 'subject_name'])->links() }}
                </div>
              </div>
            </div>

        </div>
        <div class="col-md-1"></div>
      </div>
    </div>

  
    <section class="primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center"></div>
        </div>
      </div>
    </section>





   

@endsection

@section('script')


    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
  
          $(document).ready(function(){
            $('#btn-search').click(function(){
              $('#myModal').modal('show');
            })

          })
    </script>
@endsection
