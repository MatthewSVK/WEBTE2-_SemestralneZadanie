@extends('layout')

@section('styles')
@endsection



<!-- https://cortexjs.io/mathlive/ link na stranku editora -->
@section('content')

    <h1 class="text-uppercase fs-1 fw-bold mt-5">{{__('normal.student-page-title3')}}</h1>

    <div id="task">
        <div class="container-fluid">
            <!-- skusila som asi vsetky moznosti, neviem preco to nechce ist syntax nemam zlu (dufam) -->
            @if(isset($item->image) && $item->image != "")
                <p><img src="{{ Storage::url($item->image) }}"></p>
            @endif
            <p class="my-paragraph">\[{{$item->task}}\]</p>
        </div>
    </div>
    <math-field>f(x) = \sin(x+\pi)</math-field>
    <div id="keyboard"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ URL::previous() }}" class="btn btn-secondary">{{__('normal.task-btn1')}}</a>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-secondary">{{__('normal.task-btn2')}}</button>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <!-- leave footer section empty to remove it from child page -->
@endsection

@section('scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script defer src="//unpkg.com/mathlive"></script>

@endsection
