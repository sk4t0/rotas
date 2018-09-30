@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/rotas') }}">Rota</a> :
@endsection
@section("contentheader_description", $rota->$view_col)
@section("section", "Rotas")
@section("section_url", url(config('laraadmin.adminRoute') . '/rotas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Rotas Edit : ".$rota->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
    <div class="box-header">
        
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($rota, ['route' => [config('laraadmin.adminRoute') . '.rotas.update', $rota->id ], 'method'=>'PUT', 'id' => 'rota-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'week_commence_date')
					@la_input($module, 'shop_id')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/rotas') }}" class="btn btn-default pull-right">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
    $("#rota-edit-form").validate({
        
    });
});
</script>
@endpush
