<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Personnel;

class AdminPersonnelController extends AdminController
{
    public $table = 'personnel';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'name' => '姓名',
            'mobile' => '电话',
            'email' => '邮箱',
            'birth' => '生日',
            'height' => '身高',
            'weight' => '体重',
        ];

        return view('admin.personnel.index', [
            'fields' => $fields,
            'url' => url('/admin/personnel')
        ]);
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $pagination = parent::pagination(Personnel::select('id', 'name', 'email', 'mobile', 'birth', 'height', 'weight'));

        return response()->json($pagination);
    }

    public function postIndex(HttpRequest $request)
    {
        // 还有好多验证
        $this->validate($request, [
            'name' => 'required'
        ]);

        $personnel = Personnel::create(Request::all());

        return response()->json($personnel);
    }


    public function getEdit(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:personnel,id',
        ]);

        $personnel = Personnel::find(Request::input('id'));

        return view('admin.personnel.edit', ['personnel' => $personnel->toArray()]);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:personnel,id',
        ]);

        $inputs = Request::all();
        $personnel = Personnel::find($inputs['id']);
        $personnel->update($inputs);

        return response()->json($personnel);
    }
}