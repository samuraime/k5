<form method="post" action="{{ url('/password/recover') }}">
    <input type="password" name="password"/>
    <input type="password" name="password_confirmation"/>
    <input type="submit" />
</form>