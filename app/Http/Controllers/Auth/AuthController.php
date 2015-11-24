<?php namespace App\Http\Controllers\Auth;

use Session;
use Request;
use HttpRequest;
use App\Models\Account;
use App\Http\Controllers\Controller;
// use App\Libraries\Captcha;

class AuthController extends Controller {
	public function getIndex()
	{
		return view('auth.login');
	}

	// public function getCheckCaptcha(HttpRequest $request) {
	// 	$this->validate($request, [
	// 		'captcha' => 'required',
	// 	]);

	// 	if (!Session::has('captcha')) {
	// 		abort(401);
	// 	}

	// 	if (Session::get('captcha') == strtolower(Request::get('captcha'))) {
	// 		return response('ok');
	// 	} else {
	// 		abort(403);
	// 	}
	// }

	// public function getCaptcha()
	// {
	// 	$captcha = new Captcha();
	// 	Session::put('captcha', strtolower($captcha->code));
	// 	$captcha->getImage();
	// }

	public function postLogin(HttpRequest $request)
	{
		// if ($captcha = Session::get('captcha')) {
		// 	Session::forget('captcha');
		// } else {
		// 	abort(403);
		// }

		$this->validate($request, [
			// 'email' => ['required', 'regex:/^\w+@\w+(\.\w+)+$/'],
			'name' => ['required', 'exists:account,name'],
			'password' => ['required', 'regex:/^[\S]{6,20}$/'],
			// 'captcha' => ['required', 'regex:/^' . $captcha . '$/i'],
		]);

		$account = Account::where('name', Request::get('name'))->where('password', password(Request::input('password')))->first();
		if ($account) {
			$account->permission = json_decode($account->permission);
			Session::put('account', $account->toArray());
			// return redirect('/');
			return response('ok');
		} else {
			// return redirect('/auth/')->withErrors(['用户名或密码错误']);
			abort(401);
		}
	}

	public function getLogout()
	{
		Session::flush();
		return redirect('/');
	}
}
