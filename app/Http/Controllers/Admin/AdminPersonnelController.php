<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Personnel;

class AdminPersonnelController extends AdminController
{
    public function getIndex()
    {
        return view('admin.personnel.index');
    }

    public function getById(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:personnel,id'
        ]);

        $personnel = Personnel::find(Request::input('id'));

        return response()->json($personnel);
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        return parent::pagination(Personnel::select('id', 'name', 'email', 'mobile', 'birth', 'height', 'weight'));
    }

    public function postIndex(HttpRequest $request)
    {
        // 还有好多验证
        $this->validate($request, [
            'name' => 'required'
        ]);

        $personnel = Personnel::create(Request::all());

        return response()->json($personnel);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:personnel,id',
        ]);

        $inputs = Request::all();
        $personnel = Personnel::find($inputs['id']);
        $personnel->update($inputs);

        return response()->json($personnel);
    }

    public function deleteIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:personnel,id',
        ]);

        $affectedRows = Personnel::destroy(Request::get('id'));

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteList(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::get('ids');
        $affectedRows = Personnel::destroy($ids);

        return response()->json(['affectedRows' => $affectedRows]);
    }
}