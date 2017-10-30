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
                <form action="{{ url('/learnmycourse')}}" method='get' enctype="multipart/form-data">    
                    {{ csrf_field() }}
                    <h2>บันทึกเรียบร้อย</h2> 
                    <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit" style="font-size: 17px;">กลับไปที่คอร์สเรียบของฉัน</button>
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