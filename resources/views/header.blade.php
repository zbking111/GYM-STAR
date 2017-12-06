<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{ route('homepage') }}">&nbsp;GYM STAR</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('homepage') }}">HOME</a></li>
        
        @if(Auth::check())
        <li><a href="{{ route('all_programs') }}">PROGRAM</a></li>
        <li><a href="{{ route('all_blogs') }}">BLOG</a></li>
{{--         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">TRAINING<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">All programs</a></li>
            <li><a href="#">All coach</a></li>
          </ul>
        </li> --}}

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-user"></span>{{Auth::user()->username}}
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href={{ route('mypage',Auth::user()->username) }}>My page</a></li>
            <li><a href={{ route('profile',Auth::user()->username) }}>My profile</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
        @else
        <li><a href="{{route('login')}}">LOGIN</a></li>
        <li><a href="{{route('register')}}">REGISTER</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>