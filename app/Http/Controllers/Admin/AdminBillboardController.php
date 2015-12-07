<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Billboard;
use DB;
use Session;

class AdminBillboardController extends AdminController
{
    public $table = 'billboard';
    public $primaryNav = '系统公告';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'content' => '公告内容',
            'author' => '发布者',
            'editor' => '最后编辑',
            'created_at' => '创建日期',
            'updated_at' => '修改日期',
        ];

        return view('admin.list', [
                'fields' => $fields,
                'primaryNav' => $this->primaryNav,
                'secondaryNav' => '公告列表',
            ]
        );
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);
        $query = DB::table('billboard')
            ->select(DB::raw('billboard.*, a.name author, e.name editor'))
            ->leftJoin('account AS a', 'billboard.author', '=', 'a.id')
            ->leftJoin('account AS e', 'billboard.editor', '=', 'e.id');
        $pagination = parent::pagination($query);

        return response()->json($pagination);
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'content' => 'required|string',
            'show' => 'required|in:on,off',
        ]);

        $billboard = new Billboard;
        $billboard->content = Request::get('content');
        $billboard->show = (int)(Request::get('show') == 'on');
        $billboard->author = Session::get('account.id');
        $billboard->editor = Session::get('account.id');
        $billboard->save();

        return response()->json($billboard);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:billboard,id',
        ]);

        $inputs = Request::all();
        $billboard = Billboard::find($inputs['id']);
        $billboard->update($inputs);

        return response()->json($billboard);
    }
}
