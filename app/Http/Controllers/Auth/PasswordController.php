<?php namespace App\Http\Controllers\Auth;

use Request;
use Session;
use HttpRequest;
use Cache;
use Mail;
use App\Models\Account;
use App\Http\Controllers\Controller;

class PasswordController extends Controller {
	private $recoverAccountCachePrefix = 'RecoverAccount_';

	public function getFind()
	{	
		return view('password.find');
	}

	public function postFind(HttpRequest $request) 
	{
		$this->validate($request, [
			'email' => 'required|email|exists:account,email'
		]);

		$email = Request::input('email');
		$account = Account::where('email', $email)->first();
		$token = md5($email + time());
		Cache::put($this->recoverAccountCachePrefix . $account->id, $token, 60);
		Mail::send('emails.password', [
			'account' => $account, 
			'link' => url('/password/recover') . '?' . http_build_query([
				'id' => $account->id, 
				'token' => $token
			])
		], function($message) use ($email) {
			$message->from(env('MAIL_USERNAME'))->to($email)->subject('重置密码');
		});

		return view('password.find-send');
	}

	public function getRecover(HttpRequest $request)
	{
		$this->validate($request, [
			'id' => 'required|integer|exists:account,id',
			'token' => 'required|size:32'
		]);

		$id = Request::input('id');
		$requestToken = Request::input('token');
		$cacheKey = $this->recoverAccountCachePrefix . $id;
		if (Cache::has($cacheKey) && ($cacheToken = Cache::get($cacheKey)) && $cacheToken === $requestToken) {
			Session::put('recover.id', $id);
			return view('password.recover-form');
		} else {
			return response('请求过期/请求非法');
		}
	}

	public function postRecover(HttpRequest $request) 
	{
		$this->validate($request, [
			'password' => ['required', 'regex:/^\S{6,}$/', 'confirmed'],
			'password_confirmation' => 'required'
		]);

		$id = Session::get('recover.id');
		$account = Account::find($id);
		$account->password = password(Request::input('password'));
		$account->save();

		Session::forget('recover');
		Cache::forget($this->recoverAccountCachePrefix . $id);

		return view('password.recover-success');
	}
}
