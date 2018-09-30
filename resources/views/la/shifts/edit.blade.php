@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/shifts') }}">Shift</a> :
@endsection
@section("contentheader_description", $shift->$view_col)
@section("section", "Shifts")
@section("section_url", url(config('laraadmin.adminRoute') . '/shifts'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Shifts Edit : ".$shift->$view_col)

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
                {!! Form::model($shift, ['route' => [config('laraadmin.adminRoute') . '.shifts.update', $shift->id ], 'method'=>'PUT', 'id' => 'shift-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'rota_id')
					@la_input($module, 'staff_id')
					@la_input($module, 'start_time')
					@la_input($module, 'end_time')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/shifts') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#shift-edit-form").validate({
        
    });
});
</script>
@endpush
