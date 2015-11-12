<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Log;
use DB;

class AdminLogController extends AdminController
{
    public $table = 'log';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'title' => '日志主题',
            'author' => '发布者',
            'editor' => '最后编辑',
            'created_at' => '创建日期',
            'updated_at' => '修改日期',
        ];

        return view('admin.log.index', [
            'fields' => $fields,
            'url' => url('/admin/log')
        ]);
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);
        $query = DB::table('log')
            ->select(DB::raw('log.*, a.name author, e.name editor'))
            ->leftJoin('account AS a', 'log.author', '=', 'a.id')
            ->leftJoin('account AS e', 'log.editor', '=', 'e.id');
        $pagination = parent::pagination($query);

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