<?php namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Request;
use HttpRequest;

class AdminAccountController extends AdminController
{
    public $table = 'account';
    public $primaryNav = '系统管理';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'name' => '姓名',
            // 'nickname' => '显示名',
            'mobile' => '电话',
            'email' => '邮箱',
            // 'permission' => '权限',
            'created_at' => '创建日期',
            'updated_at' => '修改日期',
        ];

        return view('admin.list', [
                'fields' => $fields,
                'primaryNav' => $this->primaryNav,
                'secondaryNav' => '账号列表',
            ]
        );
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        return parent::pagination(Account::select(['id', 'nickname', 'name', 'email', 'mobile', 'created_at', 'updated_at']));
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'name' => ['required', 'regex:/\S{6,20}/', 'unique:account,name'],
            'email' => 'required|email|unique:account,email',
            'password' => ['requried', 'regex:/\S{6,20}/', 'confirmed'],
            'password_confirmation' => 'requried',
            'nickname' => 'string|max:20',
            'mobile' => 'integer',
            'permission' => 'required|string|max:200'
        ]);

        $inputs = Request::all();
        $account = Account::create($inputs);

        return response()->json($account);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:account,id',
            'name' => ['regex:/\S{6,20}/', 'unique:account,name'],
            'nickname' => 'string|max:20',
            'email' => 'email|unique:account,email',
            'mobile' => 'string|max:20',
            'password' => ['regex:/\S{6,20}/', 'confirmed'],
            'permission' => 'string|max:200',
        ]);

        $inputs = Request::all();
        $account = Account::find($inputs['id']);
        foreach (['name', 'nickname', 'email', 'mobile', 'password', 'permission'] as $field) {
            isset($inputs[$field]) && $account->$field = $inputs[$field];
        }
        isset($inputs['password']) && $account->password = password($inputs['password']);

        $permission = ['summary', 'enterprise', 'personnel', 'session', 'article', 'log', 'index', 'account'];
        $account->permission = json_encode($permission);
        $account->save();
        $account->permission = json_decode($account->permission);

        return response()->json($account);
    }

    public function getPermisson()
    {
        $inputs = Request::all();
        $account = Account::find($inputs['id']);
        $permission = ['summary', 'enterprise', 'personnel', 'session', 'article', 'index', 'account', 'log', 'message'];
        $account->permission = json_encode($permission);
        $account->save();
        $account->permission = json_decode($account->permission);

        return response()->json($account);
    }
}
