@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ old('email') }}" autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" class="btn btn-lg btn-success btn-block">
                            <i class="fa fa-btn fa-sign-in" style="margin-right: 10px;"></i>Login
                        </button>
                        <a class="btn btn-link btn-block" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection