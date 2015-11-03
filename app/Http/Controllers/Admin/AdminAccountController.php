<?php namespace App\Http\Controllers\Admin;

use App\Models\User;
use Request;
use HttpRequest;

class AdminAccountController extends AdminController
{
    public function getIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $pagination = parent::pagination(User::select('*'));
        $fields = [
            'id' => 'ID',
            'name' => '姓名',
            'nickname' => '显示名',
            'mobile' => '电话',
            'email' => '邮箱',
            // 'permission' => '权限',
            'created_at' => '创建日期',
        ];

        return view('admin.account.index', 
            array_merge($pagination, [
                'fields' => $fields,
                'url' => url('/admin/account')
            ])
        );
    }

    public function getOne(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $user = User::find(Request::input('id'));

        return response()->json($user);
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        return parent::pagination(User::select(['id', 'name', 'email', 'mobile', 'permission']));
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'name' => ['required', 'regex:/\S{6,20}/', 'unique:user,name'],
            'email' => 'required|email|unique:user,email',
            'password' => ['requried', 'regex:/\S{6,20}/', 'confirmed'],
            'password_confirmation' => 'requried',
            'nickname' => 'string|max:20',
            'mobile' => 'integer',
            'permission' => 'required|string|max:200'
        ]);

        $inputs = Request::all();
        $user = User::create($inputs);

        return response()->json($user);
    }

    public function getEdit(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $user = User::find(Request::input('id'));

        return view('admin.account.edit', ['account' => $user->toArray()]);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
            'name' => ['regex:/\S{6,20}/', 'unique:user,name'],
            'nickname' => 'string|max:20',
            'email' => 'email|unique:user,email',
            'mobile' => 'string|max:20',
            'password' => ['regex:/\S{6,20}/', 'confirmed'],
            'permission' => 'string|max:200',
        ]);

        $inputs = Request::all();
        $user = User::find($inputs['id']);
        foreach (['name', 'nickname', 'email', 'mobile', 'password', 'permission'] as $field) {
            isset($inputs[$field]) && $user->$field = $inputs[$field];
        }
        isset($inputs['password']) && $user->password = password($inputs['password']);

        $permission = ['summary', 'enterprise', 'personnel', 'session', 'article', 'log', 'index', 'account'];
        $user->permission = json_encode($permission);
        $user->save();
        $user->permission = json_decode($user->permission);

        return response()->json($user);
    }

    public function getPermisson()
    {
        $inputs = Request::all();
        $user = User::find($inputs['id']);
        $permission = ['summary', 'enterprise', 'personnel', 'session', 'article', 'index', 'account', 'log', 'message'];
        $user->permission = json_encode($permission);
        $user->save();
        $user->permission = json_decode($user->permission);

        return response()->json($user);
    }

    public function deleteIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $affectedRows = User::destroy(Request::input('id')); 

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteList(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::input('ids');
        $affectedRows = User::destroy($ids);
        
        return $response->json(['affectedRows' => $affectedRows]);
    }
}