<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Log;
use DB;
use Session;

class AdminLogController extends AdminController
{
    public $table = 'log';
    public $primaryNav = '访问日志';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'title' => '日志主题',
            'category' => '日志分类',
            'author' => '发布者',
            'editor' => '最后编辑',
            'created_at' => '创建日期',
            'updated_at' => '修改日期',
        ];

        return view('admin.list', [
                'fields' => $fields,
                'secondaryNav' => '日志列表',
            ]
        );
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'comment' => 'string',
            'category' => 'string',
        ]);

        $log = Log::create(Request::all());
        $log->author = Session::get('account.id');
        $log->editor = Session::get('account.id');
        $log->save();

        return response()->json($log);
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
