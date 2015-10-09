<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use HttpRequest;
use Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param object $query 查询构造器
     */
    protected function pagination($query)
    {
        $inputs = Request::all();
        $perPage = isset($inputs['perPage']) ? $inputs['perPage'] : 10;
        if (isset($inputs['searchKey']) && $inputs['searchKey'] && isset($inputs['searchValue'])&& $inputs['searchValue']) {
            $query = $query->where($inputs['searchKey'], 'LIKE', "%{$inputs['searchValue']}%");
        }
        $result = $query->paginate($perPage);
        
        return response()->json($result);
    }

    protected function deleteById()
    {

    }
}