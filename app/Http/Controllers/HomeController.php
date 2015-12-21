<?php namespace App\Http\Controllers;

use App\Models\Article;
use HttpRequest;
use Request;
use App\Models\Message;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$article = Article::where('show', 1)->first();

		return view('home.index', [
			'article' => $article->toArray(),
		]);
	}

	public function getMessage()
	{
		return view('home.message');
	}

	public function postMessage(HttpRequest $request) 
	{
		$this->validate($request, [
			'title' => 'required',
			'content' => 'required',
			'type' => 'in:1,2,个人,企业',
			'name' => 'required',
			'mobile' => 'integer',
			'email' => 'email',
		]);

		$message = Message::create(Request::all());

		return view('home.message-success', [
			'message' => $message
		]);
	}
}
