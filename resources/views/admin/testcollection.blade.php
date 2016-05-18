{{ var_dump($winecollection) }}
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/sb-admin-2.css" rel="stylesheet">
<div id="green">
<table id="mt">
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
    @foreach($winecollection['records'] as $item)
    <tr>
        <td>{{ $item['id'] }}</td>
        <td>{{ $item['title'] }}</td>
        <td>{{ $item['winetype'] }}</td>
        <td>{{ $item['bottleshot'] }}</td>
        <td>{{ $item['labelshot'] }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
    <div id="green" style="margin: auto;">
    </div>
</div>
<? $totalpagerecord = $winecollection['total'] ?>
<script>
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
            theme: null });

    });
</script>
<script type="text/javascript" src="/js/smartpaginator.js"></script>

