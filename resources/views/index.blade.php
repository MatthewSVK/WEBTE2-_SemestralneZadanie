@extends('layout')

@section('styles')
    <style>

    </style>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection

@section('page-name')
    {{__('normal.hello')}}
@endsection

@section('content')
    <header class="mt-5 mb-5">
        <h1 class="text-uppercase fs-1 fw-bold">{{__('normal.home-page-title')}}</h1>
    </header>

    <div id="instruction" class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
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
                style="background: rgba(16,16,16,0.7);">{{__('normal.pdf')}}</button>

        {{--        <a class="btn mb-2 text-success" style="background: rgba(16,16,16,0.7);" href="{{ URL::to('/download-pdf') }}">Download to PDF</a>--}}
    </div>

    <hr class=" mt-3 mb-3 hr hr-blurry"/>

    <h2 class="text-uppercase fw-bold mt-3 mb-3">{{__('normal.home-page-title2')}}</h2>

    <div class="border-1 text-white border-dark py-4 mx-auto mb-3 card  text-center"
         style="padding: 0 2% 0 2%; max-width: 50%; background: rgba(16,16,16,0.7);">
        *tu bude video*
    </div>

@endsection

@section('scripts')
    <script>

        $(document).ready(function() {
            // Get the content of the div
            const divContent = $('#instruction').text().replace(/\s+/g, ' ').trim();

            // console.log(divContent);
            // Send an AJAX request to the route
            $.ajax({
                url: '/post-instruction',
                method: 'POST',
                data: {
                    content: divContent
                },
                success: function(response) {
                    console.log("success");
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
            $('#instructionPDF').click(function (){
                console.log(divContent);
                window.location.href = '/download-pdf?instructions=' + divContent;

            });
        });

    </script>
@endsection