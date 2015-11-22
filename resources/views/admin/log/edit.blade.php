@extends('admin.layout')

@section('title', '新增日志')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增日志')

@section('content')
<form class="am-form am-form-horizontal">
    <div class="am-form-group">
        <label for="title" class="am-u-sm-2 am-form-label">日志标题</label>
        <div class="am-u-sm-10">
            <input type="email" id="title" name="title" placeholder="日志标题">
        </div>
    </div>

    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">日志内容</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" placeholder="日志内容"></textarea>
        </div>
    </div>

    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-primary">提交</button>
        </div>
    </div>
</form>
@stop

@section('foot-assets')

@stop