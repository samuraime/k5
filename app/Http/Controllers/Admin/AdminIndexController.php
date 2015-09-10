<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Session;

class AdminIndexController extends AdminController
{
    public function getIndex()
    {
        return redirect('admin/summary');
    }
}