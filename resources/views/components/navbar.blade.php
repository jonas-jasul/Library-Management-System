@auth

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Library Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @if(Auth::user()->role_id==2)
                    <li class="nav-item">
                    <a class="nav-link" href="/books">View Books</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                                {{ __('Log Out') }}
                            </a>

                        </form>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role_id==3)
                {{-- 
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/books/add">Add Books</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/addCategory">Add Categories</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/authors">Authors</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="/addPublisher">Add Publishers</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="/publishers">Publishers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/books">Books</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/issueBook/">Issue Books</a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="/viewMembers">View Registered Members</a>
                </li>
             
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                                {{ __('Log Out') }}
                            </a>

                        </form>
                    </ul>
                </li>
                @endif
            </ul>

        </div>
    </div>
</nav>

@endauth

@guest
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="/">Library Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
        </li>
    </ul>
</nav>
@endguest
