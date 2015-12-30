@extends('admin.layout')

@section('title', '编辑文章')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '编辑')

@section('content')
@include('admin.edit-confirm-modal')
<form id="edit-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="/admin/article">
    <input type="hidden" name="id" value="{{ $article->id }}" />
    <div class="am-form-group">
        <label for="title" class="am-u-sm-2 am-form-label">文章标题:</label>
        <div class="am-u-sm-10">
            <input type="text" id="title" name="title" required minlength="1" placeholder="文章标题" value="{{ $article->title }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">文章内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="文章内容">{!! $article->content !!}</textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="show" class="am-u-sm-2 am-form-label">主页显示:</label>
        <div class="am-u-sm-10">
            <label class="am-checkbox-inline">
                <input type="checkbox" id="show" name="show" @if($article->show) checked @endif /> 是否显示
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