@extends('admin.layout')

@section('title', '审核留言')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '审核留言')

@section('content')
@include('admin.edit-confirm-modal')
<form id="edit-form" class="am-form am-form-horizontal" data-am-validator method="POST">
    <input type="hidden" name="id" value="{{ $message->id }}" />
    <div class="am-form-group">
        <label for="title" class="am-u-sm-2 am-form-label">留言主题:</label>
        <div class="am-u-sm-10">
            <input type="text" id="title" name="title" required minlength="1" maxlength="100" placeholder="留言主题" value="{{ $message->title }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="content" class="am-u-sm-2 am-form-label">留言内容:</label>
        <div class="am-u-sm-10">
            <textarea rows="10" id="content" name="content" required minlength="1" placeholder="留言内容">{{ $message->content }}</textarea>
        </div>
    </div>

    <div class="am-form-group">
        <label for="type" class="am-u-sm-2 am-form-label">留言类型:</label>
        <div class="am-u-sm-10">
            <select id="type" name="type" required data-am-selected="{btnWidth: '100%'}">
                @foreach(['个人', '企业'] as $type)
                <option value="{{ $type }}" @if($type == $message->type) selected @endif>{{ $type }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <label for="name" class="am-u-sm-2 am-form-label">留言者名称:</label>
        <div class="am-u-sm-10">
            <input type="text" id="name" name="name" required minlength="1" maxlength="20" placeholder="留言者名称" value="{{ $message->name }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="mobile" class="am-u-sm-2 am-form-label">联系电话:</label>
        <div class="am-u-sm-10">
            <input type="text" id="mobile" name="mobile" required minlength="1" maxlength="20" placeholder="联系电话" value="{{ $message->mobile }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="email" class="am-u-sm-2 am-form-label">电子邮箱:</label>
        <div class="am-u-sm-10">
            <input type="email" id="email" name="email" required minlength="1" maxlength="100" placeholder="电子邮箱" value="{{ $message->email }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="checked" class="am-u-sm-2 am-form-label">审核状态:</label>
        <div class="am-u-sm-10">
            <select id="checked" name="checked" required data-am-selected="{btnWidth: '100%'}">
                @foreach(['未审核', '已审核'] as $status)
                <option value="{{ $status }}" @if($status == $message->checked) selected @endif>{{ $status }}</option>
                @endforeach
            </select>
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