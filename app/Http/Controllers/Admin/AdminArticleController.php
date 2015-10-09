<?php namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Request;
use HttpRequest;

class AdminArticleController extends AdminController
{
    public function getIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:article,id',
        ]);

        $article = Article::find(Request::input('id'));

        return response()->json($article);
    }

    public function getList()
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $articles = parent::pagination(Article::select('id', 'title', 'email', 'mobile'));

        return response()->json($articles);
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $inputs = Request::all();
        $article = Article::create($inputs);

        return response()->json($article);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'exists|article,id',
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::find($inputs['id']);
        $article->update(Request::all());

        return response()->json($article);
    }

    public function deleteIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $affectedRows = Article::destroy(Request::input('id')); 

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteList(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::input('ids');
        $affectedRows = Article::destroy($ids);
        
        return $response->json(['affectedRows' => $affectedRows]);
    }
}