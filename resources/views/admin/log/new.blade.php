@extends('admin.layout')

@section('title', '新增')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增')

@section('content')
@include('admin.add-confirm-modal')
<form id="add-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="/admin/log">
    <div class="am-form-group">
        <label for="title" class="am-u-sm-2 am-form-label">日志标题:</label>
        <div class="am-u-sm-10">
            <input type="text" id="title" name="title" required minlength="1" placeholder="日志标题">
        </div>
    </div>

    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">日志内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="日志内容"></textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="comment" class="am-u-sm-2 am-form-label">备注:</label>
        <div class="am-u-sm-10">
            <textarea rows="2" id="comment" name="comment" placeholder="备注"></textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="category" class="am-u-sm-2 am-form-label">日志分类:</label>
        <div class="am-u-sm-10">
            <input type="text" id="category" name="category" placeholder="日志分类">
        </div>
    </div>

    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-primary">保存</button>
        </div>
    </div>
</form>
@stop

@section('foot-assets')
<script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/js/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('content');
</script>
@stop