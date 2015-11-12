<form method="post" action="{{ url('/password/recover') }}">
    <label>新密码</label><input type="password" name="password"/>
    <label>确认密码</label><input type="password" name="password_confirmation"/>
    <input type="submit" value="提交" />
</form>