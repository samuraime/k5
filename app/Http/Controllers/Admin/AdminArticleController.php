<?php namespace App\Http\Controllers\Admin;

use Request;
use HttpRequest;
use App\Models\Article;

class AdminArticleController extends AdminController
{
    public function getIndex(HttpRequest $request)
    {
        $fields = [
            'id' => 'ID',
            'title' => '标题',
            'author' => '发布者',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];

        return view('admin.article.index', [
            'fields' => $fields,
            'url' => url('/admin/article')
        ]);
    }

    public function getById(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:article,id'
        ]);

        $article = Article::find(Request::input('id'));

        return response()->json($article);
    }

    public function getList(HttpRequest $request)
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $pagination = parent::pagination(Article::select('*'));

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

    public function deleteIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:article,id',
        ]);

        $affectedRows = Article::destroy(Request::get('id'));

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteList(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::get('ids');
        $affectedRows = Article::destroy($ids);

        return response()->json(['affectedRows' => $affectedRows]);
    }
}