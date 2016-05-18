@extends('admin.index')
@section('title', 'User Management')
@section('content')
@section('pageheader')
    User Management
@endsection
@include('flash::message')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Create a new user</div>
        <div class="panel-body">
            {!! Form::open(['route' => 'user.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('select', 'Role:', ['class' => 'control-label']) !!}
                {!! Form::select('role_id', array('1' => 'Administrator', '2' => 'User'), null, ['class' => 'form-control col-md-4']) !!}
            </div>
                {!! Form::submit('Create a new user', ['class' => 'btn btn-success col-md-4']) !!}
            {!! Form::close() !!}
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