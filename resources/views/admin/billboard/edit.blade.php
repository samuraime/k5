@extends('admin.layout')

@section('title', '编辑公告')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '编辑公告')

@section('content')
@include('admin.edit-confirm-modal')
<form id="edit-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="" enctype="application/x-www-form-urlencoded" >
    <input type="hidden" name="id" value="{{ $billboard->id }}" />
    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">公告内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="公告内容">{{ $billboard->content }}</textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="show" class="am-u-sm-2 am-form-label">主页显示:</label>
        <div class="am-u-sm-10">
            <label class="am-checkbox-inline">
                <input type="checkbox" name="show" @if($billboard->show) checked @endif /> 是否显示
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