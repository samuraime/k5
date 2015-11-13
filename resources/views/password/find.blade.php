@extends('password.layout') @section('title', '找回密码') @section('body')
<form class="am-form am-form-horizontal" method="post" action="{{ url('/password/find') }}">
    <div class="am-form-group">
        <label for="email" class="am-u-sm-2 am-form-label">Email</label>
        <div class="am-u-sm-10">
            <input type="email" id="email" name="email" placeholder="Email">
        </div>
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-primary">发送邮件</button>
        </div>
    </div>
</form>
@stop
