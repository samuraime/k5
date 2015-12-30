@extends('admin.layout')

@section('title', '编辑日志')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '编辑')

@section('content')
@include('admin.edit-confirm-modal')
<form id="edit-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="/admin/log">
    <input type="hidden" name="id" value="{{ $log->id }}" />
    <div class="am-form-group">
        <label for="title" class="am-u-sm-2 am-form-label">日志标题:</label>
        <div class="am-u-sm-10">
            <input type="text" id="title" name="title" required minlength="1" placeholder="日志标题" value="{{ $log->title }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">日志内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="日志内容">{!! $log->content !!}</textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="comment" class="am-u-sm-2 am-form-label">备注:</label>
        <div class="am-u-sm-10">
            <textarea rows="2" id="comment" name="comment" placeholder="备注">{!! $log->comment !!}</textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="category" class="am-u-sm-2 am-form-label">日志分类:</label>
        <div class="am-u-sm-10">
            <input type="text" id="category" name="category" placeholder="日志分类" value="{{ $log->category }}" />
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