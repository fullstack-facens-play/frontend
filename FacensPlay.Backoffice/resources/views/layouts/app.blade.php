@extends('adminlte::page')

@section('title', 'Facens Play - Administrativo')

@section('content_header')
    <h1>@yield('page-title')</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-md-12">
            @yield('conteudo')
       </div>
    </div>
 </div>
@endsection

@component('components.common.modal.confirm.modal')
@endcomponent

@section('css')
    <link rel="stylesheet" href="{{ env('APP_URL') . 'css/admin_custom.css'}}">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
@stop