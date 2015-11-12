找回密码
<form method="POST" action="{{ url('/password/find') }}">
    <label>电子邮箱</label><input type="email" name="email" />
    <input type="submit" value="提交"/>
</form>