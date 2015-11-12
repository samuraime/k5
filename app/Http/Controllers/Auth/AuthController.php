<?php namespace App\Http\Controllers\Auth;

use Session;
use Request;
use HttpRequest;
use DB;
use App\Http\Controllers\Controller;

class AuthController extends Controller {
	public function getIndex()
	{
		return view('auth.login');
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	public function postLogin(HttpRequest $request)
	{
		$this->validate($request , [
			'email' => ['required', 'regex:/^\w+@\w+(\.\w+)+$/'],
			'password' => ['required', 'regex:/^[\S]{6,16}$/'],
		]);

		$account = DB::table('account')->whereRaw('email = ? AND password = ?', [Request::input('email'), password(Request::input('password'))])->first();
		if ($account) {
			$account->permission = json_decode($account->permission);
			Session::put('account', (array)$account);
			return redirect('/admin');
		} else {
			return redirect()->back()->withErrors(['用户名或密码错误']);
		}
	}

	public function getLogout()
	{
		Session::flush();
		return redirect('/');
	}
}
