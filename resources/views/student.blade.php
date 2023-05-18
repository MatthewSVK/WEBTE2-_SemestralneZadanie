@extends('layout')

@section('styles')
@endsection

@section('page-name')
    {{__('normal.student-page')}}
@endsection

@section('content')
    <h1 class="text-center text-uppercase fs-1 fw-bold mt-5">{{__('normal.student-page-title')}}</h1>

    <table class="table">
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>
                <form method="POST" action="">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $category->task_id }}">
                    <button type="submit" style="background-color: black ; color: white" class="btn" name="submit_button" value="set_{{ $loop->index }}">{{ $loop->index }}.set</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

    <hr class=" mt-3 mb-3 hr hr-blurry"/>


    <h1 class="text-center text-uppercase fs-1 fw-bold mt-5">{{__('normal.student-page-title2')}}</h1>
    <h5>{{__('normal.student-page-subtitle2')}}</h5>
    <div class="table-responsive">
        <table class="table" style="color: white">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('normal.student-page-tab-col1')}}</th>
                <th>{{__('normal.student-page-tab-col2')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr class="clickable-row" onclick="window.location.href='{{ url('/items/' . $item->id) }}'">
                    <td>{{ $item->id }}</td>
                    <td>\[{{$item->task}}\]</td>
                    <td>{{ false }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script defer src="//unpkg.com/mathlive"></script>

@endsection