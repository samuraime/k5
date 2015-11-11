@extends('admin.layout')

@section('title', '首页')

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf">
        <strong class="am-text-primary am-text-lg">首页</strong> /
        <small>数据概况</small>
    </div>
</div>
<ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
    <li>
        <a href="/admin/personnel" class="am-text-success">
            <span class="am-icon-btn am-icon-file-text"></span>
            <br>人才
            <br>{{ $stat['personnel'] }}
        </a>
    </li>
    <li>
        <a href="/admin/enterprise" class="am-text-warning">
            <span class="am-icon-btn am-icon-briefcase"></span>
            <br>企业
            <br>{{ $stat['enterprise'] }}
        </a>
    </li>
    <li>
        <a href="/admin/log" class="am-text-danger">
            <span class="am-icon-btn am-icon-recycle"></span>
            <br>日志
            <br>{{ $stat['log'] }}
        </a>
    </li>
    <li>
        <a href="/admin/message" class="am-text-secondary">
            <span class="am-icon-btn am-icon-user-md"></span>
            <br>留言
            <br>{{ $stat['message'] }}
        </a>
    </li>
</ul>


@stop

@section('foot-assets')
<script type="text/javascript" src="/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="/js/highcharts/highcharts-3d.js"></script>
<script type="text/javascript" src="/js/highcharts/highcharts-more.js"></script>
@stop