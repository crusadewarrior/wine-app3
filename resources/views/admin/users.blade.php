@extends('admin.index')
@section('title', 'User Management')
@section('content')
    @section('pageheader')
        User Management
        @endsection

<div class="col-lg-12">
    {{--@if(Session::has('error_message'))
        <div class="alert alert-danger">
            {{ Session::get('error_message') }}
        </div>
        @endif--}}
    @include('flash::message')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-users fa-fw"></i>Users
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table id="user" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Created</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{!! HTML::mailto($user->email) !!}</td>
                            <td>{{ $user->role->title }}</td>
                            <td>@if($user->created_at == ! null)
                                {{ $user->created_at->diffForHumans() }}
                                    @elseif($user->created_at == ! null)
                                    {{ $user->created_at }}
                                @else
                                    @endif
                            </td>
                            <td>@if($user->updated_at == ! null)
                                    {{ $user->updated_at->diffForHumans() }}
                                @elseif($user->updated_at == ! null)
                                    {{ $user->updated_at }}
                                @else
                                @endif
                            </td>
                            <td style="text-align: center">
                                <a href="{!! route('user.profile', ['id' => $user->id]) !!}" class="btn btn-info">Info</a>
                                <a href="{!! route('user.edit', ['id' => $user->id]) !!}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->
<script type="text/javascript">
    $(document).ready(function()
            {
                $("#user").tablesorter();
            }
    );
</script>
@endsection