<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MathPac</title>
    <link rel="icon" href="https://lh3.googleusercontent.com/AJxemLa9dl6kJBJX82BH9eSD704JBqOYG8UBVADCnYoQwozYnn1hR931XJoIOj-v3qY=h200">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    @yield('styles')
</head>
<body class="bg_image"
      style=" color: white; background: linear-gradient(90deg, rgba(18,9,121,1) 0%, rgba(196,22,22,1) 100%), rgb(18,9,121);">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://lh3.googleusercontent.com/AJxemLa9dl6kJBJX82BH9eSD704JBqOYG8UBVADCnYoQwozYnn1hR931XJoIOj-v3qY=h200"
                 alt="mathpac_logo" width="30" height="30">
        </a>
        <div class="collapse navbar-collapse">
            @yield('page-name')
        </div>
        <div id="navbarSupportedContent">
            <form class="me-auto mr-0 mb-2 mb-lg-0">
                @if (Route::has('login'))
                    @auth
                        <button type="button" class="btn btn-outline-info"
                                onclick="location.href='{{ url('/dashboard') }}';">Dashboard
                        </button>
                    @else
                        <button type="button" class="btn btn-outline-success mr-2"
                                onclick="location.href='{{ route('login') }}';">Log in
                        </button>
                        @if (Route::has('register'))
                            <button type="button" class="btn btn-outline-warning "
                                    onclick="location.href='{{ route('register') }}';">Register
                            </button>
                        @endif
                    @endauth
                @endif
            </form>
        </div>
    </div>
</nav>

<div class="container-md text-center p-0 mt-5 mb-5">
    @yield('content')
</div>

<footer class="footer text-white fixed-bottom bg-dark">
    <div class="row">
        <div class="col" style="color: transparent"></div>
        <div class="col">
            <div class="text-center p-2 bg-dark">
                © 2023 Copyright:
                <a class="text-white" href="https://tenor.com/sk/view/rage-quit-gif-24545516">FEICrewCompany</a>
            </div>
        </div>
        <div class="col text-end">
            <div class="btn-group dropup">
                <button type="button" class=" m-1 btn btn-secondary dropdown-toggle bg-dark" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('normal.langSelect')}}
                </button>
                <div class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <a id="en" class="dropdown-item" href="/language/en">EN</a>
                    <a id="sk" class="dropdown-item" href="/language/sk">SK</a>
                </div>
            </div>
        </div>
    </div>
</footer>
@yield('scripts')
</body>
</html>