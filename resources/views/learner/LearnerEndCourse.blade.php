@extends('layouts.learnerheader')

<!-- link modal popup page -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        <h1>จบคอร์สเรียน</h1>
        <center><hr></center>      
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6" style="background-color:#D8D8D8;border-radius:25px;padding:10px;">
            <form action="{{ url('/learnmycourse')}}" method='post' enctype="multipart/form-data">    
            {{ csrf_field() }}

                <div class="col-md-12" style="margin-top:10px;">
                    <center><h5 style="padding-bottom:7px">หากคอร์สนี้สิ้นสุดลงแล้ว กรุณายืนยันการจบคอร์ส</h5></center>
                </div>
                <br>
                
                <div class="container text-center">
                    <button id="btn-save" class="btn btn-primary btn-l js-scroll-trigger" learner_schedule_id="{{$agreement->learner_schedule_id}}" type="button"
                            style="font-size: 15px;font-weight: normal">ยืนยันการจบคอร์ส</button>
                </div>
            </form>    
            </div>
            
            
            <div class="col-md-3"></div>
        </div>
    </div>

        



@endsection
@section('script')
<script src="js/sweetalert.min.js"></script>
<script>

    $(document).ready(function(){
        $('#btn-save').click(function(){
            swal({
              title: "ยืนยันการจบคอร์ส",
           
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
    .then((willDelete) => {
        if (willDelete) {
            $.get('/endcoursesave&'+$(this).attr('learner_schedule_id'),function(data){
                swal("จบคอร์สเรียนเรียบร้อย", {
                icon: "success",
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location="/learnermycourse";
                    }
                });
            })
      } else {
        swal("ยกเลิกการจบคอร์สเรียน");
      }
    });
        })
    })
</script>

@endsection