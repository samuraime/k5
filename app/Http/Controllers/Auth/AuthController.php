<?php namespace App\Http\Controllers\Auth;

use Request;
use Session;
use App\Models\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	// use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{

	}

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
