@extends('admin.layout')

@section('title', '新增账号')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增账号')

@section('content')
@include('admin.add-confirm-modal')
<form id="add-form" class="am-form am-form-horizontal" data-am-validator method="POST" action="/admin/account">
    <div class="am-form-group">
        <label for="name" class="am-u-sm-2 am-form-label">用户名:</label>
        <div class="am-u-sm-10">
            <input type="text" id="name" name="name" required minlength="5" maxlength="20" placeholder="登录名">
        </div>
    </div>

    <div class="am-form-group">
        <label for="email" class="am-u-sm-2 am-form-label">电子邮箱:</label>
        <div class="am-u-sm-10">
            <input type="email" id="email" name="email" required placeholder="电子邮件">
        </div>
    </div>

    <div class="am-form-group">
        <label for="mobile" class="am-u-sm-2 am-form-label">联系电话:</label>
        <div class="am-u-sm-10">
            <input type="text" id="mobile" name="mobile" pattern="\d+" placeholder="联系电话">
        </div>
    </div>

    <div class="am-form-group">
        <label for="password" class="am-u-sm-2 am-form-label">登录密码:</label>
        <div class="am-u-sm-10">
            <input type="password" id="password" name="password" requried minlength="6" maxlength="20" placeholder="登录密码">
        </div>
    </div>

    <div class="am-form-group">
        <label for="password_confirmation" class="am-u-sm-2 am-form-label">确认密码:</label>
        <div class="am-u-sm-10">
            <input type="password" id="password_confirmation" name="password_confirmation" requried data-equal-to="#password" placeholder="确认密码">
        </div>
    </div>

    <div class="am-form-group">
        <label for="permission" class="am-u-sm-2 am-form-label">权限设置:</label>
        <div class="am-u-sm-10">
            @foreach ($permissions as $key => $permission)
            <label class="am-checkbox-inline">
                <input type="checkbox" name="permission[]" value="{{ $key }}" @if('index' == $key) disabled checked @endif>{{ $permission }}
            </label>
            @endforeach
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