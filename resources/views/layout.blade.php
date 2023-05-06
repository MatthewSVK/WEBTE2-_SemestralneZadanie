<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PLACEHOLDER</title>
   <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
  <body class="bg_image" style="background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), #FCFBF4; height: 100vh;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{__('normal.hello')}}</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @yield('menu')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              {{__('normal.langSelect')}}
              </a>
              <ul class="dropdown-menu">
                  <li><a id="en" class="dropdown-item" href="/language/en">EN</a></li>
                  <li><a id="sk" class="dropdown-item" href="/language/sk">SK</a></li>
              </ul>
          </li>
        </ul>
        <form class="d-flex">
            @if (Route::has('login'))
                @auth
                    <button type="button" class="btn btn-outline-info" onclick="location.href='{{ url('/dashboard') }}';">Dashboard</button>
                @else
                    <button type="button" class="btn btn-outline-success" onclick="location.href='{{ route('login') }}';">Log in</button>
                    @if (Route::has('register'))
                    <button type="button" class="btn btn-outline-warning" onclick="location.href='{{ route('register') }}';">Register</button>
                    @endif
                @endauth
            @endif
        </form>
    </div>
  </div>
</nav>
    <div class="container-fluid" style="padding-top: 20px">
    @yield('content')
    </div>
  </body>
</html>