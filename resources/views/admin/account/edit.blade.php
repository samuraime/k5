@extends('admin.layout')

@section('title', '编辑账号')

@section('head-assets')

@stop

@section('nav-primary', $primaryNav)
@section('nav-secondary', '编辑账号')

@section('content')
@include('admin.edit-confirm-modal')
<form id="edit-form" class="am-form am-form-horizontal" data-am-validator method="POST">
    <input type="hidden" name="id" value="{{ $account->id }}" />
    <div class="am-form-group">
        <label for="name" class="am-u-sm-2 am-form-label">用户名:</label>
        <div class="am-u-sm-10">
            <input type="text" id="name" name="name" required minlength="5" maxlength="20" placeholder="登录名" value="{{ $account->name }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="email" class="am-u-sm-2 am-form-label">电子邮箱:</label>
        <div class="am-u-sm-10">
            <input type="email" id="email" name="email" required placeholder="电子邮件" value="{{ $account->email }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="mobile" class="am-u-sm-2 am-form-label">联系电话:</label>
        <div class="am-u-sm-10">
            <input type="text" id="mobile" name="mobile" pattern="\d+" placeholder="联系电话" value="{{ $account->mobile }}" />
        </div>
    </div>

    <div class="am-form-group">
        <label for="permission" class="am-u-sm-2 am-form-label">权限设置:</label>
        <div class="am-u-sm-10">
            @foreach ($permissions as $key => $permission)
            <label class="am-checkbox-inline">
                <input type="checkbox" name="permission[]" value="{{ $key }}" @if('index' == $key) disabled checked @elseif(in_array($key, $account->permission)) checked @endif >{{ $permission }}
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