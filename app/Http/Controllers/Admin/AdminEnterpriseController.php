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

        return parent::pagination(Enterprise::select('*'));
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

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:enterprise,id',
        ]);

        $enterprise = Enterprise::find($inputs['id']);
        $enterprise->update(Request::all());

        return response()->json($enterprise);
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