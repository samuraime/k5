<?php namespace App\Http\Controllers\Admin;

use App\Models\User;
use Session;
use Request;
use HttpRequest;

class AdminSessionController extends AdminController
{
    public function getIndex()
    {
        $user = Session::get('user');
        unset($user['password']);
        
        return response()->json(['user' => $user]);
    }

    public function getProfile()
    {
        $user = User::find(Session::get('user.id'));
        unset($user->password);

        return response()->json($user);
    }

    public function putProfile(HttpRequest $request)
    {
        $this->validate($request, [
            'nickname' => 'string|max:20',
            'email' => 'required|email|unique:user,email',
            'mobile' => 'regex:/[\d\+]+/',
        ]);

        $user = User::find(Session::get('user.id'));
        $user->update(Request::all());
        $user->permission = json_decode($user->permission);
        unset($user->password);
        Session::put('user', (array)$user);

        return response()->json($user);
    }

    public function putPassword(HttpRequest $request)
    {
        $this->validate($request, [
            'oldPassword' => 'regex:/\S{6,20}/',
            'password' => ['required', 'regex:/\S{6,20}/', 'confirmed'],
        ]);

        $user = User::find(Session::get('user.id'));
        if ($user->password == password(Request::input('password'))) {
            $user->password = password(Request::input('password'));
            $user->save();
            return response()->json($user);
        } else {
            return response('Unauthorized', 401);
        }
    }
}