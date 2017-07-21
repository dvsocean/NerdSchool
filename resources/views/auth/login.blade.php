<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>
        <!--HEADER-->
        @include('includes.auth_header')
        <!--HEADER-->
    </head>

    <body>
        <!-- Top content -->
                <div class="container">
                    <div class="row" align="center">
                        <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
                          <!--PLACEHOLDER-->
		                    </div>

                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                          <div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login</h3>
	                            		<p>Enter username and password:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">




                              <form role="form" action="{{ url('/login') }}" method="post" class="login-form">
                                {{ csrf_field() }}

                                <div class="form-group ">
    			                    		<label class="sr-only" for="form-username">Email</label>
    			                        	<input type="text" name="email" placeholder="Email..." class="danika-control form-control" id="{{ $errors->has('email') ? ' has-error' : '' }}" value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="danika_errors">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                  </div>

    			                        <div class="form-group ">
    			                        	<label class="sr-only" for="form-password">Password</label>
    			                        	<input type="password" id="password" name="password" placeholder="Password..." class="danika-control form-control" id="{{ $errors->has('password') ? ' has-error' : '' }}">
                                    @if ($errors->has('password'))
                                       <span class="danika_errors">
                                           <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                   @endif
                                  </div>

    			                        <button type="submit" class="btn">Sign in</button><br><br>
                                        <a href="{{route('homePage')}}"><button type="button" class="btn btn-danger">Nevermind</button></a>
    			                    </form>
			                    </div>
		                    </div>

                        <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
                          <!--PLACEHOLDER-->
		                    </div>
                    </div>
                </div>
        <!--FOOTER-->
        @include('includes.auth_footer')
        <!--FOOTER-->
    </body>

</html>
