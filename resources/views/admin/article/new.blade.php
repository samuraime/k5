@extends('admin.layout')

@section('title', '新增文章')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增')

@section('content')
@include('admin.add-confirm-modal')
<form id="add-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="/admin/article">
    <div class="am-form-group">
        <label for="title" class="am-u-sm-2 am-form-label">文章标题:</label>
        <div class="am-u-sm-10">
            <input type="text" id="title" name="title" required minlength="1" placeholder="文章标题">
        </div>
    </div>

    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">文章内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="文章内容"></textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="show" class="am-u-sm-2 am-form-label">主页显示:</label>
        <div class="am-u-sm-10">
            <label class="am-checkbox-inline">
                <input type="checkbox" name="show" /> 是否显示
            </label>
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