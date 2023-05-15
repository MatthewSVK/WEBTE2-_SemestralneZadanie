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

@section('styles')
    <style>

    </style>
@endsection

@section('page-name')
    {{__('normal.hello')}}
@endsection

@section('content')
    <h1 class="text-uppercase fs-1 fw-bold mt-5">{{__('normal.home-page-title')}}</h1>

    <p>
        {{__('normal.home-page-desc1')}}
    </p>
    <ul style="text-align: left">
        <li>
            {{__('normal.home-page-desc2')}} <strong>{{__('normal.home-page-desc3')}}</strong>
            {{__('normal.home-page-desc4')}}
        </li>
        <li>
            {{__('normal.home-page-desc2')}} <strong>{{__('normal.home-page-desc5')}}</strong>
            {{__('normal.home-page-desc6')}}
        </li>
    </ul>
    <p>
        {{__('normal.home-page-desc7')}}
    </p>

    <hr class=" mt-3 mb-3 hr hr-blurry"/>

    <h2 class="text-uppercase fs-1 fw-bold mt-5">{{__('normal.home-page-title2')}}</h2>

    <div class="text-center">
        *tu bude video*
    </div>

@endsection