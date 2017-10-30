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
        <h1>ยกเลิกคอร์สเรียน</h1>
        <center><hr></center>      
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            
            <div class="col-md-10">
            <form action="{{ url('/learnmycourse')}}" method='post' enctype="multipart/form-data">    
            {{ csrf_field() }} 
                <div class="col-md-6" style="margin-top:10px;">
                    <label>เหตุผลที่ยกเลิกการสอน</label>
                    <textarea placeholder="เหตุผลที่ยกเลิกการสอน" rows="4" cols="50" name="comment" class="form-control" 
                                                            style="border-radius:10px;"></textarea>
                </div>
                <br>
                <div class="container">     
                    <button id="btn-save" class="btn btn-primary btn-xl js-scroll-trigger" learner_schedule_id="{{$agreement->learner_schedule_id}}" type="button" style="font-size: 17px;">ยืนยันการยกเลิกคอร์ศ</button>
                </div>
               
            </form>    
            </div>
            
            
            <div class="col-md-1"></div>
        </div>
    </div>

        

    <!-- Plugin JavaScript -->
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

    

@endsection
@section('script')
<script>

$(document).ready(function(){
    $('#btn-save').click(function(){
        swal({
            title: "ยืนยันการยกเลิกคอร์ส",
            text: "หากยกเลิกแล้วจะไม่สามารถเรียนในคอร์สนี้ได้อีก หากยังต้องการเรียนในคอร์สกรุณาเพิ่มคอร์เรียน",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.get('/endcoursesave&'+$(this).attr('learner_schedule_id'),function(data){
                    swal("ยกเลิกคอร์สเรียนเรียบร้อย", {
                        icon: "success",
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location="/learnmycourse";
                            }
                    });
                    
                })
    
            } else {
                swal("คอร์สเรียนของยังคงอยู่");
            }
        });
    })
})
</script>

@endsection