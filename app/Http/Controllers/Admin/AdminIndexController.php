<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;

class AdminIndexController extends AdminController
{
    public function getIndex()
    {
        return view('admin.index');
    }
}