@extends('layout')

@section('menu')
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">Weather report<span class="sr-only"></span></a>
</li>
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">Site statistics<span class="sr-only"></span></a>
</li>
@endsection

@section('langSelect')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
    {{__('normal.langSelect')}}
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/en">EN</a></li>
        <li><a class="dropdown-item" href="/sk">SK</a></li>
    </ul>
</li>
@endsection

@section('content')
<p>hello</p>
@endsection