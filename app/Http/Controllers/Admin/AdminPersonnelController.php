<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Personnel;

class AdminPersonnelController extends AdminController
{
    public $table = 'personnel';
    public $primaryNav = '人才信息';

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

        return view('admin.list', [
                'fields' => $fields,
                'primaryNav' => $this->primaryNav,
                'secondaryNav' => '人才列表',
            ]
        );
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
