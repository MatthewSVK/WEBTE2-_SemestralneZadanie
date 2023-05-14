@extends('layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="http://camdenre.github.io/styles/equation-editor.css">
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
                    <input type="hidden" name="item_id" value="{{ $category->ID }}">
                    <button type="submit" class="btn btn-primary" name="submit_button" value="set_{{ $loop->index }}">{{ $loop->index }}.set</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

    <!--controller na pridanie prikladu zo sady do tabulky vygenerovanych prikladov pre ziaka-->

{{--    public function add_item(Request $request)--}}
{{--    {--}}
{{--    if (strpos($request->submit_button, 'set_') === 0) {--}}
{{--    $item_id = $request->item_id;--}}
{{--    // tu sa random vyberie priklad a prida --}}
{{--    }--}}
{{--    }--}}
    <h1 class="text-uppercase fs-1 fw-bold mt-5">Assigned tasks:</h1>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Submitted</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr class="clickable-row" data-bs-toggle="modal" data-bs-target="#myModal" data-item-id="{{ $item->ID }}" data-item-name="{{ $item->task }}" data-item-submitted="{{ false }}">
                <td>{{ $item->ID }}</td>
                <td>{{ $item->task }}</td>
                <td>{{ false }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="item-id"></p>
                    <p id="item-name"></p>
                    <p id="item-submitted"></p>
                    <div id="equation-editor"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="http://camdenre.github.io/scripts/equation-editor.js"></script>
    <script src="http://camdenre.github.io/build/equationEditorConfig.js"></script>

    <script>
        $(document).ready(function() {
            $('.clickable-row').click(function() {
                var itemId = $(this).data('item-id');
                var itemName = $(this).data('item-name');
                var itemSubmitted = $(this).data('item-submitted');
                // prisposobi sa podla stlpcov v tabulke
                $('#item-id').text('ID: ' + itemId);
                $('#item-name').text('Name: ' + itemName);
                ('#item-submitted').text('Submitted: ' + itemSubmitted);

                // Initialize the equation editor
                var equationEditor = new EquationEditor($('#equation-editor')[0]);
            });
        });
    </script>

@endsection