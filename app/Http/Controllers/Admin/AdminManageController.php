<?php namespace App\Http\Controllers\Admin;

use App\Models\User;
use Request;

class AdminManageController extends AdminController
{
    public function getUser()
    {
        return view('admin.manage.user');
    }

    public function getUserJson(\Illuminate\Http\Request $request)
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

    public function postUser(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            
        ]);
    }

    public function getArticle()
    {
        return view('admin.manage.article');
    }
}