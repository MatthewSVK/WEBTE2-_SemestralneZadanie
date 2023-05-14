@extends('layout')

@section('styles')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

@endsection

@section('page-name')
    {{__('normal.teacher-page')}}
@endsection

@section('content')

    <header class="mt-5 mb-5">
        <h1 class="text-center text-uppercase fs-1 fw-bold">{{__('normal.teacher-page-title')}}</h1>
    </header>
    <main>
        <hr class=" mt-3 mb-3 hr hr-blurry" />

        <div class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
             style="padding: 0 2% 0 2%; max-width: 75%; background: rgba(16,16,16,0.7);">

            <p>{{__('normal.teacher-page-desc-1')}}</p>

            <hr class=" mt-3 mb-3 hr hr-blurry" />

            @include('components/form')

        </div>

        <hr class=" mt-3 mb-3 hr hr-blurry" />

        <div class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
             style="padding: 0 2% 0 2%; max-width: 90%; background: rgba(16,16,16,0.7);">

            <p>{{__('normal.teacher-page-desc-2')}}</p>

            <hr class=" mt-3 mb-3 hr hr-blurry" />

            <table class="table table-striped table-bordered table-sm border-1 bg-dark text-white border-dark" id="tableStudents">
                <thead class="text-center">
                <tr>
                    <th class="th-sm" id="studentName">Meno</th>
                    <th class="th-sm" id="studentSurname">Priezvisko</th>
                    <th class="th-sm" id="studentId">ID študenta</th>
                    <th class="th-sm" id="numGenTasks">Počet gen. úloh</th>
                    <th class="th-sm" id="numSubmitTasks">Počet odovz. úloh</th>
                    <th class="th-sm" id="numPoints">Počet získ. bodov</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach($students as $student)
                        <tr>
                            <td class="text-white">{{ $student->name }}</td>
                            <td class="text-white">{{ $student->surname }}</td>
                            <td class="text-white">{{ $student->id }}</td>
                            <td class="text-white">{{ $student->num_tasks }}</td>
                            <td class="text-white">{{ $student->num_handed }}</td>
                            <td class="text-white">{{ $student->points_total }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div>
                <button type="submit" name="export-csv" id="export-csv" class="btn btn-success mt-2">Export CSV</button>
            </div>
        </div>

    </main>

@endsection

@section('scripts')

    <script>
        $('#tableStudents').DataTable({
            "aoColumns": [
                null,
                null,
                { "orderData": [2, 1] },
                { "orderData": [3, 1] },
                { "orderData": [4, 1] },
                { "orderData": [5, 1] }
            ],
            "paging": false,
            "info": false,
            "searching": false
        });

        // {"bSortable": false}

        // $(document).ready(function (){
        //     $('chooseFile').addEventListener('click', function (){
        //
        //     });
        // });
    </script>

@endsection

