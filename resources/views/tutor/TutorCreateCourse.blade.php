@extends('layouts.tutorheader')

@section('content') 
<style>
    .closebtn {
      margin-top: 53px;
      font-size: 30px;
      font-weight: bold;
      cursor: pointer;
    }

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
</style>
<br>
    <section class="text-center">   
      <h1>สร้างคอร์สเรียน</h1>
      <center><hr class="btn-tutor"></center>      
    </section>

    <div class="container" style="margin-bottom: 70px;">
      <div class="row" id="result">

        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
          <div class="container">
            <div class="row">

              <div class="col-md-6 text-center">
                <div class="container">
                <div class="row">

                  <div class="col-md-12 text-center">
                    <div class="service-box">
                    
                      <h3>วัน</h3>
                      @foreach($day as $key =>$value)
                      <div class="col-md-3 text-center form-check-inline">
                        <div class="service-box">
                          <input type="checkbox" class="form-check-inline" name="day">&nbsp&nbsp{{$value->day_name}}
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>

                  <div class="  col-md-12 text-center">
                    <div class="service-box">
                      
                      <h3>เวลา</h3>
                      @foreach($duration as $key =>$value)
                      <div class="col-md-3 text-center form-check-inline">
                        <div class="service-box">
                          <input type="checkbox" class="form-check-inline" name="duration" value="duration">&nbsp&nbsp{{$value->duration_name}}
                        </div>
                      </div>
                      @endforeach
                      

                    </div>
                  </div>

                </div>
                </div>
              </div>

              <!-- ul -->
              <div class="col-md-6 text-center" style="padding-left:30px">
                <div class="container">
                <div class="row">

                  <!-- First Row of Subject and Level -->
                  <div class="col-md-12 text-center">
                    <div class="container">
                    <div class="row" id="addtime">

                      <!-- li -->
                      <div class="col-md-12 text-center">
                        <div class="container">
                        <div class="row">

                          <div class="col-md-5 text-center">
                            <div class="service-box">
                            
                              <h3>วิชา</h3>
                              <select name="subject" class="form-control" style="padding: 5px;">
                                <?php
                                  foreach($subject as $key =>$value){
                                    echo '<option value="'.$value->subject_id.'">'.$value->subject_name.'</option>' ;
                                  }			
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-5 text-center">
                            <div class="service-box">
                              
                              <h3>ระดับชั้น</h3>
                              <select name="level" class="form-control" style="padding: 5px;">
                                <?php
                                  foreach($level as $key =>$value){
                                    echo '<option value="'.$value->level_id.'">'.$value->level_name.'</option>' ;
                                  }			
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-2 text-center"></div>
                        
                        </div>
                        </div>
                      </div>
                  
                    </div>
                    </div>
                  </div>
                  <!-- End First Row of Subject and Level -->

                  <!-- Button Add Row -->
                  <div class="col-md-5 text-center"></div>
                  <div class="col-md-5 text-center" style="margin-top:20px;">
                    <button class="btn btn-tutor btn-xl js-scroll-trigger" onclick="myFunction()" style="font-size:15px;color:#ffffff;font-weight:normal;margin-bottom:20px;">เพิ่มเวลา</button>
                  </div>
                  <div class="col-md-2 text-center"></div>
                  <!-- End Button Add Row -->

                </div>
                </div>
              </div>

              <!-- Location -->
              <!-- <div class="container">
                <div class="row">
                <div class="col-lg-3 col-md-3 text-center">
                    <div class="service-box">
                      <h3>ตำบล/แขวง</h3>
                      <input type="text" id="district" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 text-center">
                    <div class="service-box">
                      <h3>อำเภอ/เขต</h3>
                      <input type="text" id="amphoe" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 text-center">
                    <div class="service-box">
                      <h3>จังหวัด</h3>
                      <input type="text" id="province" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 text-center">
                    <div class="service-box">
                      <h3>รหัสไปรษณีย์</h3>
                      <input type="text" id="zipcode" class="form-control">
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- End Location -->

              <div class="container text-center" style="margin-top:25px;margin-bottom:10px">
                <button class="btn btn-tutor btn-xl btn-size js-scroll-trigger" href="{{url('/learnermycourse')}}">สร้างคอร์สเรียน</button>
              </div>

            </div>
          </div>
        </div>
      
      </div>
    </div>

    <script>
      var count = 1;
      function myFunction() {
          var diva = document.createElement("div");
          diva.setAttribute("id", "div"+count);
          diva.setAttribute("class", "col-md-12 text-center");
          var divb = document.createElement("div");
          divb.setAttribute("class", "container");
          var divc = document.createElement("div");
          divc.setAttribute("class", "row");
          var divd = document.createElement("div");
          divd.setAttribute("class", "col-md-5 text-center");          
          var dive = document.createElement("div");
          dive.setAttribute("class", "service-box");
          var divf = document.createElement("div");
          divf.setAttribute("class", "col-md-5 text-center");
          var divg = document.createElement("div");
          divg.setAttribute("class", "service-box");
          var ha = document.createElement("h3");
          var text1 = document.createTextNode("วิชา");
          var hb = document.createElement("h3");
          var text2 = document.createTextNode("ระดับชั้น");
          var sel1 = document.createElement("select");
          sel1.setAttribute("name", "day");
          sel1.setAttribute("class", "form-control");
          var sel2 = document.createElement("select");
          sel2.setAttribute("name", "duration");
          sel2.setAttribute("class", "form-control");
          var close = document.createElement("SPAN");
          close.setAttribute("id", "close" + count);
          close.setAttribute("class", "closebtn col-md-2 text-center");
          close.setAttribute("onclick", "noDis('"+count+"')");


          diva.appendChild(divb);
          divb.appendChild(divc);

          divc.appendChild(divd);
          divd.appendChild(dive);
          dive.appendChild(ha);
          ha.appendChild(text1);
          dive.appendChild(sel1);

          divc.appendChild(divf);
          divf.appendChild(divg);
          divg.appendChild(hb);
          hb.appendChild(text2);
          divg.appendChild(sel2);

          divc.appendChild(close);
          
          document.getElementById("addtime").appendChild(diva);
          document.getElementById("close" + count).innerHTML = "&times";
          count++;
        }
        function noDis(x){
            document.getElementById("div"+x).style.display = 'none';
            document.getElementById("input"+x).value = "";
        }
    </script>
@endsection
