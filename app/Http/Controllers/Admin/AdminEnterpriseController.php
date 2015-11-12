<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Enterprise;

class AdminEnterpriseController extends AdminController
{
    public $table = 'enterprise';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'name' => '企业名',
            'type' => '类型',
            'representative' => '法人',
            'capital' => '注册资本',
            'registration_number' => '注册号',
            'registration_date' => '注册日期',
            'registration_address' => '注册地址',
        ];

        return view('admin.enterprise.index', [
            'fields' => $fields,
        ]);
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $pagination = parent::pagination(Enterprise::select('*'));

        return response()->json($pagination);
    }

    public function postIndex(HttpRequest $request)
    {
        // 还有好多验证
        $this->validate($request, [
            'name' => 'required'
        ]);

        $enterprise = Enterprise::create(Request::all());

        return response()->json($enterprise);
    }

    public function getEdit(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:enterprise,id',
        ]);

        $enterprise = Enterprise::find(Request::input('id'));

        return view('admin.enterprise.edit', ['enterprise' => $enterprise->toArray()]);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:enterprise,id',
        ]);

        $enterprise = Enterprise::find($inputs['id']);
        $enterprise->update(Request::all());

        return response()->json($enterprise);
    }
}