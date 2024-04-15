<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    {{-- custom files --}}
    <script src="jquery.js"></script>
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="shadow">
        <div class="container-fluid">
            <a id="name" class="navbar-brand" href="{{ route('home') }}"><img src="img/logo2.png"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="d-flex" role="search" method="POST" action="#">
                @csrf
                <div class="input-group me-2">
                    <input class="form-control" id="search" type="search" placeholder="Search your Books" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('writer') }}">Authors</a>
                    </li>

                    {{-- continue another nav items --}}
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="{{ route('cart') }}"><i
                                class="bi bi-cart"></i> Cart</a>
                    </li>
                    @if (session()->has('logstatus') == false)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person"></i> Account
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('register') }}">Signup</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </li>
                    @endif
                    @if (session()->has('logstatus') == true)
                        <li class="nav-item dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="bi bi-person"></i> Profile</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="bi bi-person-workspace"></i> My profile</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box"></i> Orders</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                            class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
