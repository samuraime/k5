<?php namespace App\Http\Controllers\Admin;

use App\Models\Account;
use Session;
use Request;
use HttpRequest;

class AdminSessionController extends AdminController
{
    public function getIndex()
    {
        $account = Session::get('account');
        unset($account['password']);
        
        return response()->json(['account' => $account]);
    }

    public function getProfile()
    {
        $account = Account::find(Session::get('account.id'));
        unset($account->password);

        return response()->json($account);
    }

    public function putProfile(HttpRequest $request)
    {
        $this->validate($request, [
            'nickname' => 'string|max:20',
            'email' => 'required|email',
            // 'email' => 'required|email|unique:account,email',
            'mobile' => 'regex:/[\d\+]+/',
        ]);

        $account = Account::find(Session::get('account.id'));
        $account->update(Request::all());
        $account->permission = json_decode($account->permission);
        unset($account->password);
        Session::put('account', $account->toArray());

        return response()->json($account);
    }

    public function putPassword(HttpRequest $request)
    {
        $this->validate($request, [
            'oldPassword' => 'regex:/\S{6,20}/',
            'password' => ['required', 'regex:/\S{6,20}/', 'confirmed'],
        ]);

        $account = Account::find(Session::get('account.id'));
        if ($account->password == password(Request::input('oldPassword'))) {
            $account->password = password(Request::input('password'));
            $account->save();
            unset($account->password);
            return response()->json($account);
        } else {
            return response('Unauthorized', 401);
        }
    }

    public function postCheckPassword(HttpRequest $request)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);

        if (password(Request::get('password')) == Account::find(Session::get('account.id'))->password) {
            return response('ok');
        } else {
            abort(401);
        }
    }
}