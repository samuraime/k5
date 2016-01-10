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
		if (!$article) {
			$article = [
				'title' => '海创园人才',
				'updated_at' => '2015-01-01',
				'content' => '<p style="text-align:center">请移步后台<a href="/admin/article/new">系统管理-前台文章</a>部分设置此处内容<p>',
			];
		}

		return view('home.index', [
			'article' => is_array($article) ? $article : $article->toArray(),
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
