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

                    <tr>
                        <td class="text-white">Peter</td>
                        <td class="text-white">Kopecký</td>
                        <td class="text-white">111310</td>
                        <td class="text-white">8</td>
                        <td class="text-white">7</td>
                        <td class="text-white">30</td>
                    </tr>

                    <tr>
                        <td class="text-white">Matúš</td>
                        <td class="text-white">Ďurovič</td>
                        <td class="text-white">111111</td>
                        <td class="text-white">5</td>
                        <td class="text-white">5</td>
                        <td class="text-white">22</td>
                    </tr>

                    <tr>
                        <td class="text-white">Adrián</td>
                        <td class="text-white">Soroka</td>
                        <td class="text-white">111222</td>
                        <td class="text-white">7</td>
                        <td class="text-white">5</td>
                        <td class="text-white">20</td>
                    </tr>

                    <tr>
                        <td class="text-white">Kristína</td>
                        <td class="text-white">Adamcová</td>
                        <td class="text-white">123123</td>
                        <td class="text-white">6</td>
                        <td class="text-white">5</td>
                        <td class="text-white">23</td>
                    </tr>

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

