@extends('layout.header')

@section('content')
<style>
    .btn-student{
        color:#fff;
        border-color:#DF0101;
        background-color:#DF0101
    }
    .btn-tutor{
        color:#fff;
        border-color:#FF8000;
        background-color:#FF8000
    }

    .masthead{
        position:relative;
        width:100%;
        min-height:auto;
        text-align:center;
        color:#f05f40;
        background-position:center;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size:cover
    }

    .btn-size{
        width:200px;
    }

    body {

        background-image: url("/img/learner.png"), url("/img/tutor.png");
        background-size: auto auto;
        background-repeat: no-repeat, no-repeat;
        background-position: left, right;

    }

    img {
        width: auto;
        height: auto;
    }

</style>

    <header class="masthead">
        <div class="header-content">
            <div class="header-content-inner">

                <img class="panel-heading infinite rubberBand" src="{{ url('/img/piclogo.png') }}" alt="Logo" style="width:260px;height:145px;">
                <hr>&nbsp
                <a style="color: #000000;font-size:25px;">หากคุณเป็น</a><a style="color: #DF0101;font-size:25px;font-weight: bold;">นักเรียน</a><a style="color: #000000;font-size:25px;">ที่ต้องการหาติวเตอร์ ให้กดปุ่ม</a><a style="color: #DF0101;font-size:25px;font-weight: bold;">"ค้นหาติวเตอร์"</a> <br>
                <a style="color: #000000;font-size:25px;">หากคุณเป็น</a><a style="color: #FF8000;font-size:25px;font-weight: bold;">ติวเตอร์</a><a style="color: #000000;font-size:25px;">ที่ต้องการสอนพิเศษ ให้กดปุ่ม </a><a style="color: #FF8000;font-size:25px;font-weight: bold;">"ค้นหาคอร์สสอน"</a>
                <br><br><br>
                <a class="btn btn-student btn-l btn-size js-scroll-trigger" href="{{ url('/learnermycourse') }}">ค้นหาติวเตอร์<br>(สำหรับผู้เรียน)</a>&nbsp&nbsp&nbsp
                <a class="btn btn-tutor btn-l btn-size js-scroll-trigger" href="{{ url('/tutorhome') }}">ค้นหาคอร์สสอน<br>(สำหรับติวเตอร์)</a>
            </div>
        </div>
    </header>

    <script>
        var current_button = 0;
        setInterval(function () {
            if (current_button === $('.rubberBand').length) {
                $('.rubberBand').addClass('animated');
                current_button = 0;
            }
            else {
                $('.rubberBand').removeClass('animated');
                $('.rubberBand:eq(' + current_button + ')');

                current_button++;
            }
        }, 1000)
    </script>

@endsection
