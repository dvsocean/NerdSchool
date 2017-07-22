<header id="header">
            @if(auth()->user())
        <div>
            {{ucfirst(Auth::user()->name)}}
            <a href="{{url('/discussions')}}" class="badge">
                {{count(auth()->user()->unreadNotifications)}}
            </a>
        </div>
            @endif
        <nav>
            <ul>
                <li><a href="#menu">Menu</a></li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
@if(Auth::user())
    <li><a href="{{url('/')}}">Home</a></li>
    <li><a href="{{url('/profile')}}">Profile</a></li>
    <li><a href="{{url('/discussions')}}">Discussions</a></li>
    <li><a href="{{url('/classmates')}}">Classmates</a></li>
    <li><a href="{{url('live')}}">Upload Files</a></li>
    <li><a href="{{route('settings')}}">Settings</a></li>
    <li><a href="{{url('/contact')}}">Contact</a></li>
    @endif
    </ul>
    <br>
    <br>
    <br>
    <ul class="actions vertical">
        @if(Auth::user())
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                    ({{ucfirst(Auth::user()->name)}}) Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @else
            <li><a href="{{url('/register')}}" class="button special fit">Register</a></li>
            <li><a href="/login" class="button fit">Log In</a></li>
        @endif
    </ul>
    </nav>
