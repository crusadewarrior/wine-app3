@extends('admin.index')
@section('title', 'Dashboard')
@section('content')
@section('pageheader')
    Dashboard
    <i class="fa fa-gear fa-fw"></i>
@endsection
@if(Auth::user()->role_id == '1')
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{ $usercount }} Users</div>
                </div>
            </div>
        </div>
        <a href="{{ url('admin/user') }}">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
@endif
@endsection