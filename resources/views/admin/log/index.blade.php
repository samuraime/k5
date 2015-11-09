@extends('admin.layout')

@section('title', '日志列表')

@section('head-assets')
<script type="text/javascript">
var dataTableFields = {!! json_encode($fields) !!};
</script>
@stop

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">日志管理</strong> / <small>回访记录</small></div>
</div>

@include('admin.search-box')
@include('admin.data-table')
@stop

@section('foot-assets')

@stop