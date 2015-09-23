<?php namespace App\Http\Controllers\Admin;

use App\Models\User;
use Session;
use Request;
use HttpRequest;

class AdminAccountController extends AdminController
{
    public function getIndex()
    {
        return view('admin.account.index');
    }

    public function getSession()
    {
        $user = Session::get('user');
        unset($user['password']);
        
        return response()->json(['user' => $user]);
    }

    public function getProfile()
    {
        return view('admin.account.index');
    }

    public function putProfile(HttpRequest $request)
    {
        $this->validate($request, [
            'nickname' => ['regex:/\S{6,20}/'],
            'email' => 'required|email|unique:user,email',
            'mobile' => 'regex:/[\d\+]+/',
        ]);

        $inputs = Request::all();
        $user = User::find(Session::get('user.id'));
        $user->update($inputs);

        return $user->toJson();
    }

    public function getPassword()
    {
        return view('admin.account.password');
    }

    public function putPassword(HttpRequest $request)
    {
        $this->validate($request, [
            'password' => ['required', 'regex:/\S{6,20}/', 'confirmed'],
        ]);

        // 未做原密码验证
        $user = User::find(Session::get('user.id'));
        $user->password = password(Request::input('password'));
        $user->save();

        return $user->toJson();
    }
}