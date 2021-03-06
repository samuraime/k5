<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Enterprise;

class AdminEnterpriseController extends AdminController
{
    public $table = 'enterprise';
    public $primaryNav = '企业信息';
    public $typeMap = [
        1 => '私营企业',
        2 => '股份制企业',
        3 => '集体所有制企业',
        4 => '联营企业',
        5 => '国有企业',
        6 => '联营企业',
        7 => '外商投资企业',
        8 => '港、澳、台',
        9 => '股份合作企业',
    ];
    public $staffScaleMap = [
        1 => '20人以下',
        2 => '20-100人',
        3 => '100-500人',
        4 => '100-500人',
        5 => '2000人以上',
    ];
    public $operationScaleMap = [
        1 => '100万以下',
        2 => '100-1000万',
        3 => '1000万-1亿',
        4 => '1-10亿',
        5 => '10亿以上',
    ];

    public $fields = [
        'id' => '编号',
        'name' => '企业名',
        'type' => '类型',
        'capital' => '注册资本',
        'office_address' => '办公地址',
        'area' => '占地面积',
        'staff_scale' => '员工规模',
        'operation_scale' => '经营规模',
        'created_at' => '创建日期',
        'updated_at' => '修改日期',
    ];

    public function getIndex(HttpRequest $request)
    {
        return view('admin.list', [
                'fields' => $this->fields,
                'secondaryNav' => '企业列表',
            ]
        );
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

    public function getNew()
    {
        return view('admin.' . $this->table . '.new', [
            'typeMap' => $this->typeMap,
            'staffScaleMap' => $this->staffScaleMap,
            'operationScaleMap' => $this->operationScaleMap,
        ]);
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'capital' => 'max:12',
            'area' => 'max:10',
            'office_address' => 'max:100',
        ]);

        $enterprise = Enterprise::create(Request::all());

        return response()->json($enterprise);
    }

    public function getEdit(HttpRequest $request)
    {
        $enterprise = $this->getOne($request);

        return view('admin.enterprise.edit', [
            'enterprise' => $enterprise,
            'typeMap' => $this->typeMap,
            'staffScaleMap' => $this->staffScaleMap,
            'operationScaleMap' => $this->operationScaleMap,
        ]);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:enterprise,id',
            'name' => 'required',
            'capital' => 'max:12',
            'area' => 'max:10',
            'office_address' => 'max:100',
        ]);

        $inputs = Request::all();
        $enterprise = Enterprise::find($inputs['id']);
        $enterprise->update($inputs);

        return response()->json($enterprise);
    }
}
