<?php namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use Request;
use HttpRequest;

class AdminManageController extends AdminController
{
    public function getUser()
    {
        return view('admin.manage.user');
    }

    public function getUserList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $inputs = Request::all();
        $perPage = isset($inputs['perPage']) ? $inputs['perPage'] : 10;
        $users = User::select('id', 'name', 'email', 'mobile')->paginate($perPage);

        return $users->toJson();
    }

    public function getUserById(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $user = User::find(Request::input('id'));

        return $user->toJson();
    }

    public function postUser(HttpRequest $request)
    {
        $this->validate($request, [
            'name' => ['required', 'regex:/\S{6,20}/', 'unique:user,name'],
            'email' => 'required|email|unique:user,email',
            'password' => ['requried', 'regex:/\S{6,20}/', 'confirmed'],
            'password_confirmation' => 'requried',
        ]);

        $inputs = Request::all();
        $user = User::create($inputs);

        return $user->toJson();
    }

    public function putUser(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
            // 'name' => ['regex:/\S{6,20}/', 'unique:user,name'],
            'email' => 'email|unique:user,email',
            'password' => ['regex:/\S{6,20}/', 'confirmed'],
        ]);

        $inputs = Request::all();
        $user = User::find($inputs['id']);
        if (isset($inputs['email'])) {
            $user->email = $inputs['email'];
        }
        if (isset($inputs['password'])) {
            $user->password = $inputs['password'];
        }
        $permission = ['summary', 'enterprise', 'personnel', 'manage', 'log', 'index', 'account'];
        $user->permission = $permission;
        $user->save();

        return $user->toJson();
    }

    public function getAddUserPermission()
    {
        $inputs = Request::all();
        $user = User::find($inputs['id']);
        $permission = ['summary', 'enterprise', 'personnel', 'manage', 'log', 'index', 'account'];
        $user->permission = json_encode($permission);
        $user->save();

        return $user->toJson();
    }

    public function deleteUser(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $affectedRows = User::destroy(Request::input('id')); 

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteUsers(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::input('ids');
        $affectedRows = User::destroy($ids);
        
        return $response->json(['affectedRows' => $affectedRows]);
    }

    public function getArticle()
    {
        return view('admin.manage.article');
    }

    public function getArticleById(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:article,id',
        ]);

        $article = Article::find(Request::get('id'));

        return $article->toJson();
    }

    public function getArticleList()
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $inputs = Request::all();
        $perPage = isset($inputs['perPage']) ? $inputs['perPage'] : 10;
        $articles = Article::select('id', 'title', 'email', 'mobile')->paginate($perPage);

        return $articles->toJson();
    }

    public function postArticle(HttpRequest $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $inputs = Request::all();
        $article = Article::create($inputs);

        return $article->toJson();
    }

    public function putArticle(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'exists|article,id',
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::find($inputs['id']);
        $article->title = $inputs['title'];
        $article->content = $inputs['content'];
        $article->save();

        return $article->toJson();
    }

    public function deleteArticle(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $affectedRows = Article::destroy(Request::input('id')); 

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteArticles(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::input('ids');
        $affectedRows = Article::destroy($ids);
        
        return $response->json(['affectedRows' => $affectedRows]);
    }
}