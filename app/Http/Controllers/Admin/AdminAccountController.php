<?php namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Request;
use HttpRequest;

class AdminAccountController extends AdminController
{
    public $table = 'account';
    public $primaryNav = '系统管理';
    public $permissions = [
        'index' => '首页', 
        'summary' => '数据汇总', 
        'talent' => '人才信息', 
        'enterprise' => '企业信息', 
        'log' => '访问日志', 
        'message' => '留言记录', 
        'article' => '文章管理',
        'account' => '账号管理', 
        'billboard' => '公告管理',
    ];

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'name' => '用户名',
            // 'nickname' => '显示名',
            'mobile' => '电话',
            'email' => '邮箱',
            // 'permission' => '权限',
            'created_at' => '创建日期',
            'updated_at' => '修改日期',
        ];

        return view('admin.list', [
                'fields' => $fields,
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

    public function getNew()
    {
        return view('admin.' . $this->table . '.new', [
            'permissions' => $this->permissions,
        ]);
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'name' => ['required', 'regex:/^\S{5,20}$/', 'unique:account,name'],
            'email' => 'required|email|unique:account,email',
            'password' => ['required', 'regex:/^\S{6,20}$/', 'confirmed'],
            'mobile' => 'required|integer',
            'permission' => 'required|array',
        ]);

        $inputs = Request::all();
        $account = new Account;
        $account->name = $inputs['name'];
        $account->email = $inputs['email'];
        $account->password = password($inputs['password']);
        $account->mobile = isset($inputs['mobile']) ? $inputs['mobile'] : '';
        $account->permission = json_encode(array_merge(['index'], $inputs['permission']));
        $account->save();

        return response()->json($account);
    }

    public function getEdit(HttpRequest $request)
    {
        $account = $this->getOne($request);
        $account->permission = json_decode($account->permission);

        return view('admin.account.edit', [
            'account' => $account,
            'permissions' => $this->permissions,
        ]);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:account,id',
            'name' => ['required', 'regex:/\S{5,20}/'],
            'email' => 'required|email',
            'mobile' => 'required|string|max:20',
            'password' => ['regex:/\S{6,20}/', 'confirmed'],
            'permission' => 'required|array',
        ]);

        $inputs = Request::all();
        $account = Account::find($inputs['id']);
        foreach (['name', 'email', 'mobile'] as $field) {
            $account->$field = $inputs[$field];
        }
        isset($inputs['password']) && $account->password = password($inputs['password']);
        $permission = array_merge(['index', 'session'], $inputs['permission']);
        $account->permission = json_encode($permission);
        $account->save();
        $account->permission = json_decode($account->permission);

        return response()->json($account);
    }
}
