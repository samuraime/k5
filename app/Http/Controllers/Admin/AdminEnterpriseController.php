<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Enterprise;

class AdminEnterpriseController extends AdminController
{
    public function getIndex()
    {
        return view('admin.enterprise.index');
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $inputs = Request::all();
        $perPage = isset($inputs['perPage']) ? $inputs['perPage'] : 10;
        $enterprises = Enterprise::select('id', 'registration_number AS regNumber', 'name', 'type', 'representative', 'capital', 'registration_date AS regDate', 'address', 'business_scope AS businessScope', 'registration_authority AS regAuthority')->paginate($perPage);

        return $enterprises->toJson();
    }

    public function postIndex(HttpRequest $request)
    {
        // 还有好多验证
        $this->validate($request, [
            'name' => 'required'
        ]);

        $enterprise = Enterprise::create(Request::all());

        return $enterprise->toJson();
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:enterprise,id',
        ]);

        $inputs = Request::all();
        $enterprise = Enterprise::find($inputs['id']);
        $enterprise->update($inputs);

        return $enterprise->toJson();
    }

    public function deleteIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:enterprise,id',
        ]);

        $affectedRows = Enterprise::destroy(Request::get('id'));

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteList(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::get('ids');
        $affectedRows = Enterprise::destroy($ids);

        return response()->json(['affectedRows' => $affectedRows]);
    }
}