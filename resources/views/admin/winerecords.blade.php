@extends('admin.index')
@section('title', 'Batches')
@section('content')
@section('pageheader')
    Wine records
    <i class="fa fa-list fa-fw"></i>
@endsection
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Wine Records Total Records {{ $winerecords['total'] }}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div id="green" class="table-responsive">
                <table id="mt" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Wine Type</th>
                        <th>Bottle Shot</th>
                        <th>Label Shot</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($winerecords['records'] as $item)
                        <tr>
                            <td>{!! $item['id'] !!}</td>
                            <td>{!! $item['title'] !!}</td>
                            <td>{!! $item['winetype'] !!}</td>
                            <td>
                                <img class="img-max-height" data-toggle="modal" data-target="#image-modal-{!! $item['id'] !!}" src="@if($item['bottleshot'] == ''){{ '/img/imageNotFound.jpg' }}@endif {!! $item['bottleshot'] !!}" alt="{!! $item['title'] !!}">
                            </td>
                            <td>
                                <img class="img-max-height" data-toggle="modal" data-target="#labelshot-{!! $item['id'] !!}" src="@if($item['labelshot'] == ''){{ '/img/imageNotFound.jpg' }}@endif {{ $item['labelshot'] }}">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
        @foreach($winerecords['records'] as $record)
            <div class="modal fade" id="image-modal-{!! $record['id'] !!}" role="dialog" aria-labelledby="imagePopup" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <img class="img-preview" src="{!! $record['bottleshot'] !!}">
                            <p class="text-center text-info" style="margin-top: 10px;"><strong>{{ $record['title'] }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($winerecords['records'] as $key)
        <div class="modal fade" id="labelshot-{!! $key['id'] !!}" role="dialog" aria-labelledby="imagePopup" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <img class="img-preview" src="{!! $key['labelshot'] !!}">
                        <p class="text-center text-info" style="margin-top: 10px;"><strong>{{ $key['title'] }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.panel -->
</div>
<? $totalpagerecord = $winerecords['total'] ?>
<script>
    $(function() {
        $('.pop').on('click', function() {
            $('.img-preview').attr('src', $(this).find('img').attr('src'));
            $('#image-modal').modal('show');
        });
    });
    /**
     * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
     */
    $(function() {
        function reposition() {
            var modal = $(this),
                    dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');

            // Dividing by two centers the modal exactly, but dividing by three
            // or four works better for larger screens.
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
        }
        // Reposition when a modal is shown
        $('.modal').on('show.bs.modal', reposition);
        // Reposition when the window is resized
        $(window).on('resize', function() {
            $('.modal:visible').each(reposition);
        });
    });

    /**
     * Paginate the collection
     *
     * @type {string}
     */
    var data = '<?php echo htmlspecialchars($totalpagerecord); ?>';
    $(document).ready(function () {
        $('#green').smartpaginator({
            totalrecords: data,
            recordsperpage: 10,
            datacontainer: 'mt',
            dataelement: 'tr',
            initval: 0,
            next: '>>',
            prev: '<<',
            first: null,
            last: null,
            theme: null
        });

    });
</script>
<script type="text/javascript" src="/js/smartpaginator.js"></script>
@endsection