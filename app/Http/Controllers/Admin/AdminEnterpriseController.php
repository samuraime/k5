<?php namespace App\Http\Controllers\Admin;

class AdminEnterpriseController extends AdminController
{
    public function getIndex()
    {
        return view('admin.enterprise.index');
    }
}