@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/rating.css">

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
    
    div label {
        font-size: 20px;
    }

</style>

@section('content')

    <section id="services" class="text-center">   
        <h1>การเรียนในครั้งนี้และการนัดหมายครั้งต่อไป</h1>
        <center><hr></center>      
    </section>

    <div class="container">
        <div class="row">
        
            <div class="col-md-10">
                <form action="{{ url('/save')}}" method='post' enctype="multipart/form-data">    
                    {{ csrf_field() }}
                    
                    <div class="col-md-12"  style="background-color:#D8D8D8;border-radius:25px;padding:10px;">
                         <div class="container">
                            <div class="row">
                                <div class="col-md-6" style="margin-top:10px;">
                                    <label>ราคาต่อชั่วโมง</label>
                                    <input placeholder="ราคาต่อชั่วโมง" name="price"  class="form-control" style="border-radius:10px;"/>
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <label>เวลาที่เริ่ม</label>
                                    <input type="time" name="start_time" class="form-control" style="border-radius:10px;"/>   
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <label>เวลาที่จบ</label>
                                    <input type="time" name="end_time" class="form-control" style="border-radius:10px;"/>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="margin-top:10px;">
                                    <input type="text" placeholder="จำนวนชั่วโมง" name="time"  class="form-control" style="border-radius:10px;"/>   
                                    <h4>ชั่วโมง</h4>
                                </div>
                                <div class="col-md-4" style="margin-top:10px;">
                                    <input type="text" placeholder="จำนวนเงิน" name="total"  class="form-control" style="border-radius:10px;"/>   
                                    <h4>บาท</h4>
                                </div>
                            </div>
                        </div>
                    <div>
           
                    <div class="col-md-12"  style="background-color:#D8D8D8;border-radius:25px;padding:10px;">
                         <div class="container">
                            <div class="row">
                                <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                                <div class="col-md-6" style="margin-top:10px;">
                                    <label>รายละเอียดเพิ่มเติม</label>
                                    <textarea placeholder="รายละเอียดเพิ่มเติม" rows="4" cols="50" name="moredetail" class="form-control"
                                                            style="border-radius:10px;"></textarea>
                                </div>
            
                                <div class="col-md-6" style="margin-top:10px;">
                                    <label>วิจารณ์เกี่ยวกับการสอน</label>
                                    <textarea placeholder="วิจารณ์เกี่ยวกับการสอน" rows="4" cols="50" name="comment" class="form-control" 
                                                            style="border-radius:10px;"></textarea>
                                </div>
            
                              
                                <div class="col-md-4" style="margin-top:10px;">
                                    <label class="fontsize">วันนัดหมายครั้งต่อไป</label>
                                    <input type="date" name="nextdeal" class="form-control" style="border-radius:10px;"/>  
                                </div>
                            </div>
                        </div>
                    </div>    
                    <button   class="btn btn-primary btn-xl js-scroll-trigger" type="submit" style="font-size: 17px;">ยอมรับ</button>
                </form>  
            </div>                          
        </div>
    </div>
              

            
            <div class="col-md-1"></div>
        </div>
    </div>

        

    <!-- Plugin JavaScript -->
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    

@endsection
@section('script')
<script>
        var current_button = 0;
        setInterval(function () {
            if (current_button === $('.pulse').length) {
                $('.pulse').addClass('animated');
                current_button = 0;
            }
            else {
                $('.pulse').removeClass('animated');
                $('.pulse:eq(' + current_button + ')');

                current_button++;
            }
        }, 1000)
function diff(start, end) {
    //console.log(end);
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);
    var time = hours+':'+minutes;
    if(!isNaN(hours)){
        $('input[name="time"]').val(time)
        var price = $('input[name="price"]').val();
        var total = (hours*price)+((price/60)*minutes);
        $('input[name="total"]').val(total)
    }
    
    // console.log(hours+':'+minutes)
    console.log(time)
    //console.log(hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes;
}
$(document).ready(function(){
    $('input[name="start_time"]').change(function(){
        diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
        
 })
    $('input[name="end_time"]').change(function(){
        diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
        
    })
    $('input[name="price"]').keyup(function(){
        diff($('input[name="start_time"]').val(), $('input[name="end_time"]').val())
    })
})
        // $(document).ready(function(){
        //     $('#btn-save').click(function(){
        //         swal({
        //   title: "บันทึก?",
        //   buttons: true,
        //   dangerMode: true,
        // })
        // .then((willDelete) => {
        //     if (willDelete) {
        //         $.get('/endcoursesave&'+$(this).attr('learner_schedule_id'),function(data){
        //             swal("บันทึกเรียบร้อย", {
        //                 icon: "success",
        //             })
        //             window.location="/learnmycourse";
        //         })
        //     } 
        // });
        //     })
        // })
    </script>
@endsection