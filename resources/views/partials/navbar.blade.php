<nav class="navbar navbar-expand-lg navbar-white bg-white">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">JOB-SEEKER</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav"
      aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
        <li class="nav-item"><a href="{{ url('/blog') }}" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
        @if(auth()->check())
       
        <li class="nav-item dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ auth()->user()->email }}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('profile')}}">View Profile</a>
            <a class="dropdown-item" href="{{ route('abasic.info.edit') }}">Update</a>
            <a class="dropdown-item" href="{{route('show.all.applied.jobs')}}">Applications</a>
            <form action="{{route('logout')}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                @csrf
            
                <button type="submit" class="btn btn-outline-danger">
                    <i class="fas fa-trash"></i>    Logout
                </button>
            </form>
        
           
          </div>
          </li>
          @else
          <li class="nav-item">        
            <a href="{{route('login-form')}}"  class="nav-link">Login</a>  
          </li>
  
          @endif
       
      </ul>
    </div>
  </div>
</nav>
