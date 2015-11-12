<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Log;

class AdminLogController extends AdminController
{
    public $table = 'log';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => 'ID',
            'name' => '姓名',
            'mobile' => '电话',
            'email' => '邮箱',
            'birth' => '生日',
            'height' => '身高',
            'weight' => '体重',
        ];

        return view('admin.log.index', [
            'fields' => $fields,
            'url' => url('/admin/log')
        ]);
    }

    public function getById(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:log,id'
        ]);

        $log = Log::find(Request::input('id'));

        return response()->json($log);
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $pagination = parent::pagination(Log::select('id', 'name', 'email', 'mobile', 'birth', 'height', 'weight'));

        return response()->json($pagination);
    }

    public function postIndex(HttpRequest $request)
    {
        // 还有好多验证
        $this->validate($request, [
            'name' => 'required'
        ]);

        $log = Log::create(Request::all());

        return response()->json($log);
    }


    public function getEdit(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:log,id',
        ]);

        $log = Log::find(Request::input('id'));

        return view('admin.log.edit', ['log' => $log->toArray()]);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:log,id',
        ]);

        $inputs = Request::all();
        $log = Log::find($inputs['id']);
        $log->update($inputs);

        return response()->json($log);
    }
}