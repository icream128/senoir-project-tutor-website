@extends('layouts.learnerheader')

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

</style>
<br>
    <section class="text-center">   
      <h1>สร้างคอร์สเรียน</h1>
      <center><hr></center>      
    </section>

    <div class="container">
      <div class="row" id="result">

        <div class="col-md-12 rows" style="margin-top:30px;background-color:#D8D8D8;padding:20px;border-radius:25px;">
          <div class="container">
            <div class="row">

              <div class="col-md-6 text-center">
                <div class="container">
                <div class="row">

                  <div class="  col-md-6 text-center">
                    <div class="service-box">
                    
                      <h3>วิชา</h3>
                      <select name="subject" class="form-control">
                      <?php
                                  foreach($subject as $key =>$value){
                                    echo '<option value="'.$value->subject_id.'">'.$value->subject_name.'</option>' ;
                                  }			
                                ?>
                      </select>
                    </div>
                  </div>

                  <div class="  col-md-6 text-center">
                    <div class="service-box">
                      
                      <h3>ระดับชั้น</h3>
                      <select name="level" class="form-control">
                      <?php
                                  foreach($level as $key =>$value){
                                    echo '<option value="'.$value->level_id.'">'.$value->level_name.'</option>' ;
                                  }			
                                ?>
                      </select>
                    </div>
                  </div>

                </div>
                </div>
              </div>

              <!-- ul -->
              <div class="col-md-6 text-center">
                <div class="container">
                <div class="row" id="addtime">
                
              <!-- li -->
                <div class="col-md-12 text-center">
                  <div class="container">
                  <div class="row">

                    <div class="col-md-5 text-center">
                      <div class="service-box">
                      
                        <h3>วัน</h3>
                        <select name="day" class="form-control">
                        <?php
                                  foreach($day as $key =>$value){
                                    echo '<option value="'.$value->day_id.'">'.$value->day_name.'</option>' ;
                                  }			
                                ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-5 text-center">
                      <div class="service-box">
                        
                        <h3>ช่วงเวลา</h3>
                        <select name="duration" class="form-control">
                        <?php
                                  foreach($duration as $key =>$value){
                                    echo '<option value="'.$value->duration_id.'">'.$value->duration_name.'</option>' ;
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

              <div class="col-md-6 text-center"></div>
              <div class="col-md-6 text-center" style="margin-top:20px;">
                <div class="container">
                  <div class="row">
                
                    <div class="col-md-12 text-center">
                      <div class="container">
                      <div class="row">

                        <div class="col-md-5 text-center"></div>
                        <div class="col-md-5 text-center">
                          <button class="btn btn-primary btn-xl js-scroll-trigger" onclick="myFunction()" style="font-size:15px;color:#ffffff;font-weight:normal;margin-bottom:20px;">เพิ่มเวลา</button>
                        </div>
                        <div class="col-md-2 text-center"></div>

                      </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              

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

              <div class="container text-center" style="margin-top:25px;margin-bottom:10px">
                <button class="btn btn-primary btn-xl js-scroll-trigger" href="{{url('/learnermycourse')}}">สร้างคอร์สเรียน</button>
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
          var text1 = document.createTextNode("วัน");
          var hb = document.createElement("h3");
          var text2 = document.createTextNode("ช่วงเวลา");
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
