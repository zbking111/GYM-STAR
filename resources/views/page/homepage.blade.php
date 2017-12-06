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

@endsection