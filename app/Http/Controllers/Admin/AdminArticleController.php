<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Article;
use DB;
use Session;

class AdminArticleController extends AdminController
{
    public $table = 'article';
    public $primaryNav = '系统管理';

    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => '编号',
            'title' => '标题',
            'author' => '发布者',
            'editor' => '最后编辑',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];

        return view('admin.list', [
                'fields' => $fields,
                'secondaryNav' => '文章列表',
            ]
        );
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $query = DB::table('article')
            ->select(DB::raw('article.*, a.name author, e.name editor'))
            ->leftJoin('account AS a', 'article.author', '=', 'a.id')
            ->leftJoin('account AS e', 'article.editor', '=', 'e.id');
        $pagination = parent::pagination($query);

        return response()->json($pagination);
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'show' => 'in:on,off',
        ]);

        $inputs = Request::all();
        $article = Article::create($inputs);
        $article->show = (int)(isset($inputs['show']) && $inputs['show'] == 'on');
        $article->author = Session::get('account.id');
        $article->editor = Session::get('account.id');
        $article->save();
        $this->setOnlyShow($article);

        return response()->json($article);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:article,id',
            'content' => 'required',
            'show' => 'in:on,off',
        ]);
        
        $inputs = Request::all();
        $article = Article::find($inputs['id']);
        $article->update($inputs);
        $article->show = (int)(isset($inputs['show']) && $inputs['show'] == 'on');
        $article->save();
        $this->setOnlyShow($article);

        return response()->json($article);
    }
}
