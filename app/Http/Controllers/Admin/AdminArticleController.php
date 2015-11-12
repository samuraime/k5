<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Article;
use DB;

class AdminArticleController extends AdminController
{
    public $table = 'article';
    
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

        return view('admin.article.index', [
            'fields' => $fields,
            'url' => url('/admin/article')
        ]);
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
        // 还有好多验证
        $this->validate($request, [
            'name' => 'required'
        ]);

        $article = Article::create(Request::all());

        return response()->json($article);
    }


    public function getEdit(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:article,id',
        ]);

        $article = Article::find(Request::input('id'));

        return view('admin.article.edit', ['article' => $article->toArray()]);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:article,id',
        ]);

        $inputs = Request::all();
        $article = Article::find($inputs['id']);
        $article->update($inputs);

        return response()->json($article);
    }
}