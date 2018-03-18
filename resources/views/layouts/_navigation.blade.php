<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('login') }}">YSGLearning</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('School') }}">Search School</a>
                </li>
                @guest
                  @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('consentForm') }}">Consent Form</a>
                        </li>
                    @if (Auth::user()->usertype == 'parent')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('viewResult') }}">View Result</a>
                        </li>
                    @endif
                        @if (Auth::user()->usertype == 'teacher')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('adminconsentForm') }}">Modify Consent Form</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('publishStud') }}">Publish Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('uploadResults') }}">Upload Results</a>
                        </li>
                        @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('chat') }}">Live Chat</a>
                </li>
                    @endguest
            </ul>
        </div>
        <div>
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
            @else
                <li class="nav-link"><a href="#" >{{ Auth::user()->name }}</a></li>
                <li class="nav-link"><a href="{{ route('logout') }}" >Logout</a></li>
            @endguest
          </ul>
        </div>
    </div>
</nav>
