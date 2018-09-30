@extends("la.layouts.app")

@section("contentheader_title", "Shift Breaks")
@section("contentheader_description", "Shift Breaks listing")
@section("section", "Shift Breaks")
@section("sub_section", "Listing")
@section("htmlheader_title", "Shift Breaks Listing")

@section("headerElems")
@la_access("Shift_Breaks", "create")
    <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Shift Break</button>
@endla_access
@endsection

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

<div class="box box-success">
    <!--<div class="box-header"></div>-->
    <div class="box-body">
        <table id="example1" class="table table-bordered">
        <thead>
        <tr class="success">
            @foreach( $listing_cols as $col )
            <th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
            @endforeach
            @if($show_actions)
            <th>Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
            
        </tbody>
        </table>
    </div>
</div>

@la_access("Shift_Breaks", "create")
<div class="modal fade modal-warning" id="AddModal" role="dialog" aria-labelledby="myModalLabel">    <div class="modal-dialog" role="document" style="width: 100%; height: 100%; padding-top: 20px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Shift Break</h4>
            </div>
            {!! Form::open(['action' => 'LA\Shift_BreaksController@store', 'id' => 'shift_break-add-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'shift_id')
					@la_input($module, 'start_time')
					@la_input($module, 'end_time')
                    --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
    $("#example1").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/shift_break_dt_ajax') }}",
        language: {
            lengthMenu: "_MENU_",
            search: "_INPUT_",
            searchPlaceholder: "Search"
        },
        @if($show_actions)
        columnDefs: [ { orderable: false, targets: [-1] }],
        @endif
    });
    $("#shift_break-add-form").validate({
        
    });
});
</script>
@endpush
