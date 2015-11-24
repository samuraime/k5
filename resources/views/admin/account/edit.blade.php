@extends('admin.layout')

@section('title', '新增账号')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '新增账号')

@section('content')
<form class="am-form am-form-horizontal">
    <div class="am-form-group">
        <label for="name" class="am-u-sm-2 am-form-label">用户名:</label>
        <div class="am-u-sm-10">
            <input type="text" id="name" name="name" placeholder="登录名">
        </div>
    </div>

    <div class="am-form-group">
        <label for="email" class="am-u-sm-2 am-form-label">电子邮箱:</label>
        <div class="am-u-sm-10">
            <input type="email" id="email" name="email" placeholder="电子邮件">
        </div>
    </div>

    <div class="am-form-group">
        <label for="mobile" class="am-u-sm-2 am-form-label">联系电话:</label>
        <div class="am-u-sm-10">
            <input type="text" id="mobile" name="mobile" placeholder="联系电话">
        </div>
    </div>

    <div class="am-form-group">
        <label for="password" class="am-u-sm-2 am-form-label">登录密码:</label>
        <div class="am-u-sm-10">
            <input type="password" id="password" name="password" placeholder="登录密码">
        </div>
    </div>

    <div class="am-form-group">
        <label for="password_comfirmation" class="am-u-sm-2 am-form-label">确认密码:</label>
        <div class="am-u-sm-10">
            <input type="password" id="password_comfirmation" name="password_comfirmation" placeholder="确认密码">
        </div>
    </div>

    <div class="am-form-group">
        <label for="permission" class="am-u-sm-2 am-form-label">权限设置:</label>
        <div class="am-u-sm-10">
            <label class="am-checkbox-inline">
                <input type="checkbox" name="permission[]" value="index" disabled checked>首页
            </label>
            <label class="am-checkbox-inline">
                <input type="checkbox" name="permission[]" value="option2" /> 同时可以选我
            </label>
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