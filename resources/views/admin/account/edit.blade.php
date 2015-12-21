<form class="am-form am-form-horizontal" method="post" action="{{ url('/password/recover') }}">
    <div class="am-form-group">
        <label for="password" class="am-u-sm-2 am-form-label">新密码</label>
        <div class="am-u-sm-10">
            <input type="password" id="password" name="password" placeholder="新密码">
        </div>
    </div>
    <div class="am-form-group">
        <label for="password-comfirmation" class="am-u-sm-2 am-form-label">确认密码</label>
        <div class="am-u-sm-10">
            <input type="password" id="password-comfirmation" name="password_confirmation" placeholder="确认密码">
        </div>
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <button type="submit" class="am-btn am-btn-primary">提交登入</button>
        </div>
    </div>
</form>
