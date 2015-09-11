<?php namespace App\Http\Controllers\Admin;

use App\Models\User;
use Request;
use HttpRequest;
use User;
use Article;

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
    }

    public function deleteUser(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);


    }

    public function getArticle()
    {
        return view('admin.manage.article');
    }

    public function postArticle(HttpRequest $request)
    {

    }

    public function putArticle(HttpRequest $request)
    {

    }
}