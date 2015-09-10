<?php namespace App\Http\Controllers\Admin;

class AdminPersonnelController extends AdminController
{
    public function getIndex()
    {
        return view('admin.personnel.index');
    }

    public function getPersonnelJson()
    {
        $users = Personnel::select('id', 'name', 'email', 'mobile')->paginate(2);
        return $users->toJson();
    }
}