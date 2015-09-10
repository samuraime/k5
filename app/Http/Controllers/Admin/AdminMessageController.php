<?php namespace App\Http\Controllers\Admin;

class AdminMessageController extends AdminController
{
    public function getIndex()
    {
        return view('admin.message.index');
    }
}