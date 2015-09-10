<?php namespace App\Http\Controllers\Admin;

class AdminAccountController extends AdminController
{
    public function getIndex()
    {
        return view('admin.account.index');
    }

    public function getProfile()
    {
        return view('admin.account.index');
    }

    public function getPassword()
    {
        return view('admin.account.password');
    }
}