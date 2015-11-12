<?php namespace App\Http\Controllers\Auth;

use Session;
use Request;
use HttpRequest;
use App\Models\Account;
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
			// 'email' => ['required', 'regex:/^\w+@\w+(\.\w+)+$/'],
			'name' => ['required', 'exists:account,name'],
			'password' => ['required', 'regex:/^[\S]{6,16}$/'],
		]);

		$account = Account::where('name', Request::get('name'))->where('password', password(Request::input('password')))->first();
		if ($account) {
			$account->permission = json_decode($account->permission);
			Session::put('account', $account->toArray());
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
