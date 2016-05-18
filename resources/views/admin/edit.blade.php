@extends('admin.index')
@section('title', 'Edit User')
@section('content')
@section('pageheader')
    Edit User
@endsection
@include('flash::message')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">User Management</div>
        <div class="panel-body">
            <form method="POST" action="{{ url('admin/user/update') }}/{{ $user->id }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="control-label">Name:</label>
                    <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label class="control-label">Email:</label>
                    <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label class="control-label">New Password</label>
                    <input class="form-control" type="password" name="password" value="">
                </div>
                <div class="form-group">
                    <label class="control-label">Role</label>
                    <select class="form-control" name="role_id">
                        <option <? if($user->role_id == 1) {echo 'selected';} ?> value="1">Administrator</option>
                        <option <? if($user->role_id == 2) {echo 'selected';} ?> value="2" >User</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Edit user</button>
            </form>
        </div>
        <div class="panel-footer">
            <i class="fa fa-long-arrow-left fa-fw"></i><a href="{!! URL::previous() !!}">Back</a>
        </div>
    </div>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
</div>
@endsection