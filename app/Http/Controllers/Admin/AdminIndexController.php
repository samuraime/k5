<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Session;
use App\Models\User;

class AdminIndexController extends AdminController
{
    public function getIndex()
    {
        return redirect('admin/summary');
    }

    public function getReact()
    {
        return view('admin.react-index');
    }
}