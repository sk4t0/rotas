@extends('la.layouts.app')

@section('htmlheader_title') File Manager @endsection
@section('contentheader_title') File Manager @endsection
@section('contentheader_description') Manage your file here @endsection

@section('main-content')
    <!-- Element where elFinder will be created (REQUIRED) -->
    <div id="elfinder"></div>
@endsection

@push('styles')
    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />


    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset($dir.'/themes/Material/css/theme-gray.css') }}">

@endpush

@push('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <!-- elFinder JS (REQUIRED) -->
    <script src="{{ asset($dir.'/js/elfinder.min.js') }}"></script>

    {{--@if($locale)--}}
        {{--<!-- elFinder translation (OPTIONAL) -->--}}
        {{--<script src="{{ asset($dir."/js/i18n/elfinder.$locale.js") }}"></script>--}}
    {{--@endif--}}

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        $().ready(function() {
            $('#elfinder').elfinder({
                // set your elFinder options here
                {{--@if($locale)--}}
                {{--lang: '{{ $locale }}', // locale--}}
                {{--@endif--}}
                customData: {
                    _token: '{{ csrf_token() }}'
                },
                url : '{{ env('APP_URL') }}/admin/file-manager/connector',  // connector URL
                soundPath: '{{ asset($dir.'/sounds') }}',
                height: 800
            });
        });
    </script>
@endpush