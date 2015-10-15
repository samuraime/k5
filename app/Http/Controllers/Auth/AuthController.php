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

	public function postLogin(\Illuminate\Http\Request $request)
	{
		$this->validate($request , [
			'email' => ['required', 'regex:/^\w+@\w+(\.\w+)+$/'],
			'password' => ['required', 'regex:/^[\S]{6,16}$/'],
		]);

		$user = DB::table('user')->whereRaw('email = ? AND password = ?', [Request::input('email'), password(Request::input('password'))])->first();
		if ($user) {
			$user->permission = json_decode($user->permission);
			Session::put('user', (array)$user);
			return redirect('admin');
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
