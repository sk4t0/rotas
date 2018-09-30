@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/staff') }}">Staff</a> :
@endsection
@section("contentheader_description", $staff->$view_col)
@section("section", "Staff")
@section("section_url", url(config('laraadmin.adminRoute') . '/staff'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Staff Edit : ".$staff->$view_col)

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
                {!! Form::model($staff, ['route' => [config('laraadmin.adminRoute') . '.staff.update', $staff->id ], 'method'=>'PUT', 'id' => 'staff-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'first_name')
					@la_input($module, 'surname')
					@la_input($module, 'shop_id')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/staff') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#staff-edit-form").validate({
        
    });
});
</script>
@endpush
