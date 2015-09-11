<?php namespace App\Http\Controllers\Admin;

use Request;
use App\Models\Personnel;

class AdminPersonnelController extends AdminController
{
    public function getIndex()
    {
        return view('admin.personnel.index');
    }

    public function getPersonnelJson(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $inputs = Request::all();
        $perPage = isset($inputs['perPage']) ? $inputs['perPage'] : 10;

        $users = Personnel::select('id', 'name', 'email', 'mobile', 'birth_date as birthDate', 'height', 'weight')->paginate($perPage);
        return $users->toJson();
    }

    public function postIndex(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [

        ]);

        $personnel = new Personnel;
        var_dump($personnel);
    }
}