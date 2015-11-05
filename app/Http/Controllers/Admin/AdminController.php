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
        if (isset($inputs['searchKey']) && $inputs['searchKey'] && isset($inputs['searchValue']) && $inputs['searchValue']) {
            $query = $query->where($inputs['searchKey'], 'LIKE', "%{$inputs['searchValue']}%");
        }
        $pagination = $query->paginate($perPage);
        $pagination = $pagination->toArray();
        
        extract($pagination);
        $blockCount = 5;
        $show_page_count = $blockCount > $last_page ? $last_page : $blockCount;
        $left_offset = floor(($show_page_count - 1) / 2);
        $right_offset = floor($show_page_count / 2);
        if ($last_page > $show_page_count) {
            if ($current_page - $left_offset <= 0) {
                $start_page = 1;
                $end_page = $show_page_count;
            } else if ($current_page + $right_offset > $last_page ) {
                $start_page = $last_page - $show_page_count;
                $end_page = $last_page;
            } else {
                $start_page = $current_page - $left_offset;
                $end_page = $current_page + $right_offset;
            }
        } else {
            $start_page = 1;
            $end_page = $show_page_count;
        }

        $pagination = array_merge($pagination, ['start_page' => $start_page, 'end_page' => $end_page]);
        return $pagination;
    }

    protected function paginationJson($query)
    {
        $inputs = Request::all();
        $perPage = isset($inputs['perPage']) ? $inputs['perPage'] : 10;
        if (isset($inputs['searchKey']) && $inputs['searchKey'] && isset($inputs['searchValue'])&& $inputs['searchValue']) {
            $query = $query->where($inputs['searchKey'], 'LIKE', "%{$inputs['searchValue']}%");
        }
        $pagination = $query->paginate($perPage);

        return $pagination;
    }

    protected function deleteById()
    {

    }
}