<?php namespace App\Http\Controllers\Admin;

class AdminSummaryController extends AdminController
{
    public function getIndex()
    {
        return view('admin.summary.index');
    }
}