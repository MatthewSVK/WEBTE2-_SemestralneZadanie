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
    <header class="mt-5 mb-5">
        <h1 class="text-uppercase fs-1 fw-bold">{{__('normal.home-page-title')}}</h1>
    </header>

    <div class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
         style="padding: 0 2% 0 2%; max-width: 90%; background: rgba(16,16,16,0.7);">
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
    </div>
    <div>
        <button type="submit" name="instructionPDF" id="instructionPDF" class="btn mb-2 text-success"
                style="background: rgba(16,16,16,0.7);">Download to PDF</button>
    </div>

    <hr class=" mt-3 mb-3 hr hr-blurry"/>

    <h2 class="text-uppercase fw-bold mt-3 mb-3">{{__('normal.home-page-title2')}}</h2>

    <div class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
         style="padding: 0 2% 0 2%; max-width: 50%; background: rgba(16,16,16,0.7);">
        *tu bude video*
    </div>

@endsection