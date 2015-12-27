@extends('admin.layout')

@section('title', '新增公告')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增公告')

@section('content')
@include('admin.add-confirm-modal')
<form id="add-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="/admin/article">
    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">公告内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="公告内容"></textarea>
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
@stop