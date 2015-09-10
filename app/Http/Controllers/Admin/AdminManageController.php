<?php namespace App\Http\Controllers\Admin;

class AdminManageController extends AdminController
{
    public function getUser()
    {
        return view('admin.manage.user');
    }

    public function getArticle()
    {
        return view('admin.manage.article');
    }
}