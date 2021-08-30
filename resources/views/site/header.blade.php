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
                                        <button class="dropdown-item btn btn-secondary btn-block">
                                            <a class="dropdown-item btn btn-secondary btn-block p-0 m-0"
                                               href="{{ route('pages') }}" role="button">Admin</a>
                                        </button>
                                        <br>
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
                                            <a class="dropdown-item btn btn-secondary btn-block p-0 m-0"
                                               href="{{ route ('login') }}" role="button">Login</a>
                                        </button>
                                    </div>
                                @endauth
                            @endif
                        </li>

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