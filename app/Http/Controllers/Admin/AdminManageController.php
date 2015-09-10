<?php namespace App\Http\Controllers\Admin;

use App\Models\User;

class AdminManageController extends AdminController
{
    public function getUser()
    {
        return view('admin.manage.user');
    }

    public function getUserJson(\Illuminate\Http\Request $request)
    {
        $users = User::select('id', 'name', 'email', 'mobile')->paginate(2);
        return $users->toJson();
    }

    public function getArticle()
    {
        return view('admin.manage.article');
    }
}