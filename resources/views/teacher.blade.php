@extends('layout')

@section('styles')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

@endsection

@section('content')

    <header class="mt-5">
        <h1 class="text-center text-uppercase fs-1 fw-bold">Nastavenia súborov</h1>
    </header>
    <hr class=" mt-5 mb-5 hr hr-blurry" />
    <main>

        <div class="border-1 bg-dark text-white border-dark py-4 position-absolute top-50 start-50 translate-middle card  text-center"
             style="padding: 0 2% 0 2%;">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, aliquam animi asperiores autem
                distinctio dolore impedit laudantium libero nemo nobis obcaecati odit optio placeat recusandae
                repudiandae saepe vel veniam voluptatum!</p>

            <hr class=" mt-3 mb-3 hr hr-blurry" />

            @include('components/form')

        </div>

    </main>

@endsection

@section('scripts')

    <script>
        // $('#tableFiles').dataTable();

        // $(document).ready(function (){
        //     $('chooseFile').addEventListener('click', function (){
        //
        //     });
        // });
    </script>

@endsection

