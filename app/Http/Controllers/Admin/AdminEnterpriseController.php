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
    public $operationScaleStaff = [
        1 => '100万以下',
        2 => '100-1000万',
        3 => '1000万-1亿',
        4 => '1-10亿',
        5 => '10亿以上',
    ];


    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'name' => '企业名',
            'type' => '类型',
            // 'representative' => '法人',
            'capital' => '注册资本',
            'office_address' => '办公地址',
            'area' => '占地面积',
            'staff_scale' => '员工规模',
            'operation_scale' => '经营规模',
            // 'registration_number' => '注册号',
            // 'registration_date' => '注册日期',
            // 'registration_address' => '注册地址',
        ];

        return view('admin.list', [
                'fields' => $fields,
                'primaryNav' => $this->primaryNav,
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
            'primaryNav' => $this->primaryNav,
            'typeMap' => $this->typeMap,
            'staffScaleMap' => $this->staffScaleMap,
            'operationScaleMap' => $this->operationScaleStaff,
        ]);
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'capital' => 'digits_between:0,12',
            'area' => 'digits_between:0,10',
        ]);

        $enterprise = Enterprise::create(Request::all());

        return response()->json($enterprise);
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
