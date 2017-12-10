<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  {{--   <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="{{Asset('css/bootstrap.min.css')}}"> --}}
  <script type="text/javascript" src="{{Asset('js/jquery-validate/jquery.validate.js')}}"></script>
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
  }
/*h3, h4 {
  margin: 10px 0 30px 0;
  letter-spacing: 10px;      
  font-size: 20px;
  color: #111;
  }*/
  .container {
    padding: 50px 0px;

  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    /*-webkit-filter: grayscale(90%);*/
    /*filter: grayscale(90%);*/ /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }

  /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
  .row.content {height: 600px}

  /* Set gray background color and 100% height */
  .sidenav {
    padding-top: 50px;
    background-color: #f1f1f1;
    height: 100%;
  }

  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
    .sidenav {
      height: auto;
      padding: 15px;
    }
    .row.content {height:auto;} 
  }

  .mypage {
    padding-top: 50px;
    padding-bottom: 50px
    width: 100%;
    height: 100%;
  }

  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 15px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: #777 !important;
  }
  footer {
    background-color: #2d2d30;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }

  .form-inline .form-group{
    margin-left: 0;
    margin-right: 0;
  }

</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  @include('header')
  <div class="mypage">
    <div class="container-fluid text-center">    
      <div class="row content">
        <div class="col-sm-2 sidenav">
          @if((Auth::user()->aim != 2))
          <p><a href="{{ route('mypage',Auth::user()->username)}}">My Programs</a></p>
          @endif
          <p><a href="{{ route('myblog',Auth::user()->username)}}">My Blogs</a></p>
          <p><a href="{{ route('top_like') }}">Top Program</a></p>
        </div>

        @yield('content')
        <div class="col-sm-2 sidenav">
          <h3 align="center">Search program</h3>
          <form action="{{route('search',Auth::user()->username)}}" class="form-horizontal" method="GET" name="search-program" id="search-program" enctype="multipart/form-data" >       
            <div class="form-group">
              <label class="control-label">Age (Year old) :<span class="text-danger"> *</span></label><br> 
              <input type="text" class="form-control" name="age" id="age" placeholder="Enter your age" required="" value="">
              <span class="text-danger" id="error-age"></span>
            </div>

            <div class="form-group">
              <label class="control-label">Weight (Kg) :<span class="text-danger"> *</span></label><br>  
              <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter your weight" required="" value="">
              <span class="text-danger" id="error-weight"></span>
            </div>
            <div class="form-group">
              <label class="control-label">Height (Cm) :<span class="text-danger"> *</span></label><br>  
              <input type="text" class="form-control" name="height" id="height" placeholder="Enter your height" required="" value="">
              <span class="text-danger" id="error-height"></span>
            </div>

            <div class="form-group">            
              <input name="Submit" type="submit" value="Search" class="btn btn-primary">
            </div>
          </form>

          <script type="text/javascript">
            $("#search-program").validate({
              rules:{
                age:{
                  required:true,
                  digits: true,
                },
                weight:{
                  required:true,
                  digits: true,
                },
                height:{
                  required:true,
                  digits: true,
                },
              },
              messages:{

              },

              errorPlacement: function(error, element) {
                error.appendTo('#error-' + element.attr('id'));
              }


            })
          </script>
        </div>
      </div>
    </div>
  </div>
</div>

@include('footer')
</body>
</html>

