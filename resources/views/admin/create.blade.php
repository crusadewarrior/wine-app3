@extends('admin.index')
@section('title', 'User Management')
@section('content')
@section('pageheader')
    User Management
@endsection
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Create a new user</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('user.store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Role</label>
                    <div class="col-md-6">
                        <select class="form-control" name="role_id">
                            <option value="1">Administrator</option>
                            <option value="2" selected="selected">User</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Create user
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    @endif
</div>


@endsection