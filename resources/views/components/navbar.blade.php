<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{route('main')}}" class="navbar-brand p-0">
             <img src="{{asset('img/ilmfoyda.png')}}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{route('main')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                <a href="{{route('service')}}" class="nav-item nav-link">Service</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            @if (Auth::guest())
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{asset('img/user.png')}}" alt="Logo">
                </a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('login') }}" class="dropdown-item">Kirish</a>
                    <a href="{{ route('register')}}" class="dropdown-item">Ro'yxatdan o'tish</a>
                </div>
            </div>
            @else
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="{{asset('img/user.png')}}" alt="Logo">
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('dashboard') }}">Mening Profilim</a>
                    </div>
                </div>
            @endif
        </div>
    </nav>

</div>
<!-- Navbar & Hero End -->
