@extends('admin.layout')

@section('title', $secondaryNav)
@section('nav-primary', $primaryNav)
@section('nav-secondary', $secondaryNav)

@section('content')
<ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
    <li>
        <a href="/admin/personnel" class="am-text-success">
            <span class="am-icon-btn am-icon-file"></span>
            <br>人才信息
            <br>{{ $stat['personnel'] }}
        </a>
    </li>
    <li>
        <a href="/admin/enterprise" class="am-text-warning">
            <span class="am-icon-btn am-icon-file-text"></span>
            <br>企业信息
            <br>{{ $stat['enterprise'] }}
        </a>
    </li>
    <li>
        <a href="/admin/log" class="am-text-danger">
            <span class="am-icon-btn am-icon-calendar"></span>
            <br>访问日志
            <br>{{ $stat['log'] }}
        </a>
    </li>
    <li>
        <a href="/admin/message" class="am-text-secondary">
            <span class="am-icon-btn am-icon-pencil-square-o"></span>
            <br>留言记录
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