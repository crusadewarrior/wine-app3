@extends('admin.index')
@section('title', 'Batches')
@section('content')
@section('pageheader')
    Batches
    <i class="fa fa-list fa-fw"></i>
@endsection
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Batches Page {{ $data['pagenumber'] }} {!! '&nbsp;' !!}{!! '&nbsp;' !!}{!! '&nbsp;' !!}{!! '&nbsp;' !!} Total Records {{ $data['totalrecords'] }}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table id="batches" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Batch Type</th>
                        <th>Release Date</th>
                        <th>Is Free</th>
                        <th>Is Live</th>
                        <th>Total Wines</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach($data['records'] as $item)
                        <tr>
                            <td><a href="{{ route('get.batchid') }}?batchid={{ $item['id'] }}">{!! $item['id'] !!}</a></td>
                            <td>{!! $item['batchType'] !!}</td>
                            <td>{!! $item['releaseDate'] !!}</td>
                            <td>{!! $item['isFree'] !!}</td>
                            <td>{!! $item['isLive'] !!}</td>
                            <td>{!! $item['totalWines'] !!}</td>
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
{{ $result->render() }}
{{--{{ $result->total($data['totalrecords']) }}--}}

<script type="text/javascript">
    $(function(){
        $("#batches").tablesorter({ sortList: [[3,0]] });
    });
</script>
@endsection