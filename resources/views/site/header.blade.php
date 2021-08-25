<div class="container">
    <div class="header_box">

        <div class="logo"><a href="#"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a></div>

        @if(isset($menu))

            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                            data-target="#main-nav"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="main-nav" class="collapse navbar-collapse navStyle">
                    <ul class="nav navbar-nav" id="mainNav">

                        @foreach($menu as $item)
                            {{--                    <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>--}}
                            <li><a href="#{{ $item['alias'] }}" class="scroll-link">{{ $item['title'] }}</a></li>

                        @endforeach

                        <li class="nav-item dropdown">
                            @if(Route::has('login'))
                                @auth
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Welcome, {{ Auth::user()->name }}!
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item btn btn-secondary btn-block">
                                                <a class="dropdown-item btn btn-secondary btn-block p-0 m-0"
                                                   role="button">Logout</a>
                                            </button>
                                        </form>
                                    </div>

                                @else
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Welcome, guest!
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <button class="dropdown-item btn btn-secondary btn-block">
                                        <a class="dropdown-item btn btn-secondary btn-block p-0 m-0" href="{{ route('login')
                                        }}" role="button">Login</a>
                                    </button>
                                    </div>
                            @endauth
                            @endif
                        </li>

                        {{-- @if(Route::has('login'))
                             <div class="absolute form-inline top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                                 @auth
                                     <span>Welcome back, {{ Auth::user()->name }}!</span>

                                     <form action="{{ route('logout') }}" method="POST">
                                         @csrf
                                         <button type="submit" class="btn btn-info">Logout</button>
                                     </form>

                                 @else

                                     <a href="{{ route('login') }}" class="btn btn-info" role="button">Login</a>
                                     @if (Route::has('register'))
                                         <a href="{{ route('register') }}" class="btn btn-info" role="button">Register</a>
                                     @endif
                                 @endauth
                             </div>
                         @endif--}}
                    </ul>
                </div>

            </nav>


        @endif
    </div>
</div>




@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif