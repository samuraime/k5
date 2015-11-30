<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Message;

class AdminMessageController extends AdminController
{
    public $table = 'message';
    public $primaryNav = '留言记录';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'title' => '留言主题',
            'type' => '留言类型',
            'name' => '留言者',
            'mobile' => '联系电话',
            'email' => '电子邮箱',
            'checked' => '审核状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];

        return view('admin.list', [
                'fields' => $fields,
                'primaryNav' => $this->primaryNav,
                'secondaryNav' => '留言列表',
            ]
        );
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $pagination = parent::pagination(Message::select('*'));

        return response()->json($pagination);
    }

    // public function postIndex(HttpRequest $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required'
    //     ]);

    //     $message = Message::create(Request::all());

    //     return response()->json($message);
    // }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:message,id',
        ]);

        $inputs = Request::all();
        $message = Message::find($inputs['id']);
        $message->update($inputs);

        return response()->json($message);
    }
}
