@extends('layout')

@section('styles')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>


    <style>
        #numTasks:hover, #numHanded:hover, #pointsTotal:hover{
            cursor: pointer;
            background: rgba(25,135,84);
            transition: background-color 0.7s;
        }
        .dataTables_wrapper .dt-buttons {
            float:none;
            text-align:center;
        }
    </style>
@endsection

@section('page-name')
    {{__('normal.teacher-page')}}
@endsection

@section('content')

    <header class="mt-5 mb-5">
        <h1 class="text-center text-uppercase fs-1 fw-bold">{{__('normal.teacher-page-title')}}</h1>
    </header>
    <main>
        <hr class=" mt-3 mb-3 hr hr-blurry"/>

        <div class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
             style="padding: 0 2% 0 2%; max-width: 75%; background: rgba(16,16,16,0.7);">

            <p>{{__('normal.teacher-page-desc-1')}}</p>

            <hr class=" mt-3 mb-3 hr hr-blurry"/>

            @include('components/form')

        </div>

        <hr class=" mt-3 mb-3 hr hr-blurry"/>

        <div class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
             style="padding: 0 2% 0 2%; max-width: 90%; background: rgba(16,16,16,0.7);">

            <p>{{__('normal.teacher-page-desc-2')}}</p>

            <hr class=" mt-3 mb-3 hr hr-blurry"/>

            <table class="table table-striped table-bordered table-sm border-1 bg-dark text-white border-dark"
                   id="tableStudents">
                <thead class="text-center">
                <tr>
                    <th class="th-sm" id="studentName">Meno a Priezvisko</th>
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
                        <td class="text-white">{{ $student->id }}</td>
                        <td class="text-white" id="numTasks" data-bs-toggle="modal" data-bs-target="#descModal" data-content="Zoznam vygenerovaných úloh">{{ $student->num_tasks }}</td>
                        <td class="text-white" id="numHanded" data-bs-toggle="modal" data-bs-target="#descModal" data-content="Zoznam odovzdaných úloh">{{ $student->num_handed }}</td>
                        <td class="text-white" id="pointsTotal" data-bs-toggle="modal" data-bs-target="#descModal" data-content="Výsledok správnosti">{{ $student->points_total }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
{{--            <div>--}}
{{--                <button type="submit" name="export-csv" id="export-csv" class="btn btn-success mt-2">Export CSV</button>--}}
{{--            </div>--}}
        </div>

    </main>

    <div class="modal fade bd-example-modal-lg" id="descModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true" style="color: black">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-around">
                    <div class="row w-100">
                        <div class="col"></div>
                        <div class="col-8">
                            <h5 class="modal-title fs-5" style="text-align: center; margin: 0 auto;" id="exampleModalLabel">Info</h5>
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn-close" style="margin: 0;" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <p>tu bude zoznam uloh ktore student vypracoval</p>
                    <p>tu bude zoznam uloh ktore student odovzdal</p>
                    <p>tu bude vysledok spravnosti odovzdanych uloh</p>
                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Submit</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            let table = $('#tableStudents').DataTable({
                "aoColumns": [
                    null,
                    null,
                    {"orderData": [2, 1]},
                    {"orderData": [3, 1]},
                    {"orderData": [4, 1]},
                    {"orderData": [5, 1]}
                ],
                "paging": false,
                "info": false,
                "searching": false,
                dom: 'frtipB',
                buttons: [
                    {
                        filename: 'students_list',
                        extend: 'csvHtml5',
                        titleAttr: 'CSV',
                        text: 'Export CSV',
                        className: 'btn btn-success mt-2',
                        charset: 'utf-8',
                        extension: '.csv',
                        bom: true,

                    },
                ]
            });
            // table.buttons().container()
            //     .appendTo( '#export-csv .col-md-6:eq(0)' );

            $('#numTasks').click(function() {
                let content = $(this).data('content');
                $('#descModal .modal-title').text(content);
            });
            $('#numHanded').click(function() {
                let content = $(this).data('content');
                $('#descModal .modal-title').text(content);
            });
            $('#pointsTotal').click(function() {
                let content = $(this).data('content');
                $('#descModal .modal-title').text(content);
            });
        });
    </script>

@endsection

