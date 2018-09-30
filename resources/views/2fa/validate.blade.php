@extends('la.layouts.auth')

@section('content')
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>{{ LAConfigs::getByKey('sitename_part1') }} </b>{{ LAConfigs::getByKey('sitename_part2') }}</a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg">Enter your 2FA code</p>
                <form class="form-horizontal" role="form" method="POST" action="/2fa/validate">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('totp') ? ' has-error' : '' }} has-feedback">
                        <input type="text" class="form-control" placeholder="One Time Password" name="totp">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('totp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('totp') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                Validate
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection