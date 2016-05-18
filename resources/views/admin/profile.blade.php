@extends('admin.index')
@section('title', 'User Management')
@section('content')
@section('pageheader')
    User Profile
    <i class="fa fa-gear fa-fw"></i>
@endsection
<div class="col-lg-5 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            My Information
        </div>
        <div class="panel-body">
            <i class="fa fa-user fa-5x" style="color: #C4C4C4"></i>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ $user->role->title }}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>@if($user->created_at == ! null)
                            {{ $user->created_at->diffForHumans() }}
                        @elseif($user->created_at == ! null)
                            {{ $user->created_at }}
                        @else
                        @endif</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>@if($user->updated_at == ! null)
                            {{ $user->updated_at->diffForHumans() }}
                        @elseif($user->updated_at == ! null)
                            {{ $user->updated_at }}
                        @else
                        @endif</td>
                </tr>
                @if(Auth::user()->role_id == '1')
                <tr>
                    <th>
                        Actions
                    </th>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{!! route('user.edit', ['id' => $user->id]) !!}" class="btn btn-warning">Edit</a>
                            </div>
                            <div class="col-md-4">
                                <form method="post" action="{!! route('user.delete', ['id' => $user->id]) !!}" class="form-inline">
                                    {!! csrf_field() !!}
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                    @endif
                </thead>
            </table>
        </div>
        <div class="panel-footer">
            <i class="fa fa-long-arrow-left fa-fw"></i><a href="{!! URL::previous() !!}">Back</a>
        </div>
    </div>
</div>
@endsection