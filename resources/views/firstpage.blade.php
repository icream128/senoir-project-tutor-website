@extends('layout.header')
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
     background-color:#222;
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
      width:200;
    }
</style>

@section('content')
    
    <header class="masthead">
    <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">หาติวดีลงาน</h1><br>
          <hr>
          <p>หากคุณเป็นนักเรียนที่ต้องการหาติวเตอร์ ให้กดปุ่ม"ค้นหาติวเตอร์" <br>
            หากคุณเป็นติวเตอร์ที่ต้องการสอนพิเศษ ให้กดปุ่ม"ค้นหาคอร์สสอน" </p>
          <a class="btn btn-tutor btn-xl btn-size js-scroll-trigger" href="/tutorhome">ค้นหาคอร์สสอน<br>(สำหรับติวเตอร์)</a>
          <a class="btn btn-student btn-xl btn-size js-scroll-trigger" href="/learnerhome">ค้นหาติวเตอร์<br>(สำหรับผู้เรียน)</a>
        </div>
      </div>
    </header>

@endsection
