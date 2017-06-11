<!DOCTYPE HTML>
<html>
<head>
    <title>Reset your password</title>
    <!--HEADER-->
    @include('includes.header')
    <!--HEADER-->
</head>
<body>

<br><br>
<br><br>
<br><br>

    <!--PASS RESET FORM-->
    <div class="container">
        <div class="row" align="center">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading" id="reset_title"><h5>Reset Password</h5></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-sm-6 col-lg-6">
                                        <button type="submit" class="btn btn-default">
                                            Send Reset Link
                                        </button><br>
                                        <a href="javascript:history.back()">Nevermind</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <!--PLACEHOLDER-->
            </div>
        </div>
    </div>
    <!--PASS RESET FORM-->


    <style>
        .reset_pass_footer {
            position: fixed;
            bottom: 0px;
            right: 0px;
            left: 0px;
        }
    </style>

    <div class="reset_pass_footer">
        @include('includes.footer')
    </div>
</body>
</html>
