@extends('layout')

@section('styles')
@endsection

@section('content')
    <h1 class="text-uppercase fs-1 fw-bold mt-5">Generate tasks:</h1>

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

    <h1 class="text-uppercase fs-1 fw-bold mt-5">Assigned tasks:</h1>
    <h5>(to show click on the task)</h5>
    <div class="table-responsive">
        <table class="table" style="color: white">
            <thead>
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Submitted</th>
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