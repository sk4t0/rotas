@extends('la.layouts.app')
@section("contentheader_title", "2FA")
@section("contentheader_description", "disabling 2fa")
@section("section", "2FA")
@section("sub_section", "Disabling")
@section("htmlheader_title", "Disabling 2FA")

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">2FA Secret Key</div>

                    <div class="panel-body">
                        2FA has been removed
                        <br /><br />
                        <a href="{{ url('/' . config('laraadmin.adminRoute')) }}">Go to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection