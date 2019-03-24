<style>
  .med{
    padding-left: 28cm;
  }
  .med2{
    padding-left: 7cm;
  }
  .hip{
      font-size:12px;
  }
  .logo{
      height: 4px;
  }
  </style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">MediTrack</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-tog2gler-icon"></span>
  </button>
  <div class="hip">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      
      
      <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item med">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item ">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else  
                      @if(auth()->user()->access == 2)
                      <li><a class="nav-item nav-link" href="/home">Dashboard </a></li>
                      <li><a class="nav-item nav-link" href="/hospital">Channel Dash</a></li>
                      <li><a class="nav-item nav-link" href="/live_search">Meditarck Search</a></li>
                      <li><a class="nav-item nav-link" href="/hospital/{hospital}">User Channels</a></li>
                      @else
                    <li><a class="nav-item nav-link" href="/home">Dashboard </a></li>
                    <li><a class="nav-item nav-link" href="/timeline">My Timeline</a></li>
                    <li><a class="nav-item nav-link" href="/echannel">E-Channeling</a></li>
                    <li><a class="nav-item nav-link" href="/onlinehelp">Online Help</a></li>
                    <li><a class="nav-item nav-link" href="/events">Calender</a></li>
                    <li><a class="nav-item nav-link" href="/echannel/show">Channel Dash</a></li>
                    @if(auth()->user()->access == 1)
                    <li><a class="nav-item nav-link" href="/live_search">Meditarck Search</a></li>
                    @else 
                    @endif
                    @if(auth()->user()->access == 3)
                    <li><a class="nav-item nav-link" href="/live_search">Meditarck Search</a></li>
                    @else 
                    @endif     
                    @endif    
                    <li><a class="nav-item nav-link" href="#">Meditarck App</a></li>
                    <li><a class="nav-item nav-link" href="#">More About MediTrack</a></li>
                  

                    <li class="nav-item dropdown med2">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
     
    </div>
  </div>
  </div>
</nav>

