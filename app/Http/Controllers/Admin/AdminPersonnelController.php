<?php namespace App\Http\Controllers\Admin;

class AdminPersonnelController extends AdminController
{
    public function getIndex()
    {
        return view('admin.personnel.index');
    }
}