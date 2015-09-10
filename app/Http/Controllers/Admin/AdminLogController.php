<?php namespace App\Http\Controllers\Admin;

class AdminLogController extends AdminController
{
    public function getVisit()
    {
        return view('admin.log.visit');
    }
}