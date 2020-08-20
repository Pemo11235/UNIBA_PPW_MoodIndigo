<!-- Fixed navbar -->

<nav class="navbar navbar-light navbar-expand-md custom-header fixed-top">
    <div class="container-fluid"><a class="navbar-brand" onClick="document.location.href='http://localhost/MoodIndigo/public/'">Mood<span>Indigo</span>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span
                class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navbar-collapse">

                @guest
                <ul class="nav navbar-nav links">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/MoodIndigo/public/">Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    {{--
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#"> Link 3</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link custom-navbar" href="#"> Link 4</a>--}}
                </ul>
                @else
                <ul class="nav navbar-nav links">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/MoodIndigo/public/">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('projects.index')}}">Dashboard Progetti</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('analysis.index')}}">Dashboard Analisi</a></li>
                </ul>
                <div class="nav navbar-nav ml-auto">
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                            aria-expanded="false"
                                            href="#"> {{ Auth::user()->name }}<img
                                class="rounded-circle img-fluid dropdown-image" src="{{asset('img/AIQ61.png')}}">

                            <div class="dropdown-menu dropdown-menu-right " role="">
                                <a class="dropdown-item" role="presentation" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                    </li>
                </div>

                @endguest



        </div>
    </div>
