@extends('master')

@section('title')
GYM STAR
@endsection

@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="image/slide/gym1.jpg" alt="gym1" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>

    <div class="item">
      <img src="image/slide/gym2.jpg" alt="gym2" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>
    
    <div class="item">
      <img src="image/slide/gym3.jpg" alt="gym3" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>

    <div class="item">
      <img src="image/slide/gym4.jpg" alt="gym4" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<center><h2>Các dịch vụ luyện tập và <br class='hidden-xs'>những cách giảm cân hiệu quả</h2>
</center>

<div class="row">
  <div class="col-sm-4">
    <center><h3>DANCE </h3></center>
    <img src="image/services/dance-giam-can.jpg" class="img-responsive" style="width:100%" alt="Image">
    
  </div>
  <div class="col-sm-4">
    <center><h3>Huấn Luyện cá nhân</h3> </center>  
    <img src="image/services/huong-dan-giam-can.jpg" class="img-responsive" style="width:100%" alt="Image">

  </div>

  <div class="col-sm-4"> 
    <center><h3> KICKFIT</h3></center>
    <img src="image/services/mma-giam-can.jpg" class="img-responsive" style="width:100%" alt="Image">

  </div>

  <div class="col-sm-4">
    <center><h3>GIẢM CĂNG CƠ</h3></center>
    <img src="image/services/tap-the-duc-giam-can.jpg" class="img-responsive" style="width:100%" alt="Image">
    
  </div>
  <div class="col-sm-4">
    <center><h3>Giảm Cân</h3></center> 
    <img src="image/services/the-duc-giam-can.jpg" class="img-responsive" style="width:100%" alt="Image">

  </div>

  <div class="col-sm-4">
    <center><h3>YOGA </h3></center> 
    <img src="image/services/yoga-giam-can.jpg" class="img-responsive" style="width:100%" alt="Image">

  </div>

</div>
<br>

<center><h2>Video tutorials</h2>
</center>

<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/YdB1HMCldJY" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    </div>

    <div class="col-sm-6">
     <iframe width="560" height="315" src="https://www.youtube.com/embed/fcN37TxBE_s" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
   </div>
    <br>
   <div class="col-sm-6">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/11WLF24-5iM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
  </div>

  <div class="col-sm-6">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/M9Z4YsinNMk" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
  </div>
</div>
</div>




@endsection