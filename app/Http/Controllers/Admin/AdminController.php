<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use HttpRequest;
use Request;
use View;
use App\Models\Billboard;
use Excel;

class AdminController extends Controller
{
    public $primaryNav;
    public $table;

    public function __construct()
    {
        $this->middleware('auth');

        $billboard = Billboard::where('show', 1)->first();
        View::share('globalBillboard', $billboard);
        View::share('primaryNav', $this->primaryNav);
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
        $pagination = $query->orderBy('id', 'DESC')->paginate($perPage);
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

    protected function postInfo($modelName, HttpRequest $request, $validator = [])
    {
        $this->validate($request, $validator);

        $model = 'App\\Models\\' . $modelName;
        $orm = $model::create(Request::all());

        return response()->json($orm);
    }

    protected function putInfo($modelName, HttpRequest $request, $validator = [])
    {
        $this->validate($request, $validator);

        $inputs = Request::all();
        $model = 'App\\Models\\' . $modelName;
        $orm = $model::find($inputs['id']);
        $orm->update($inputs);

        return response()->json($orm);
    }

    public function getNew()
    {
        return view('admin.' . $this->table . '.new');
    }

    protected function getOne(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:' . $this->table . ',id'
        ]);

        $model = 'App\\Models\\' . ucfirst($this->table);
        $orm = $model::find(Request::input('id'));

        return $orm;
    }

    public function getView(HttpRequest $request)
    {
        $orm = $this->getOne($request);
        return view("admin.{$this->table}.view", [$this->table => $orm]);
    }

    public function getEdit(HttpRequest $request)
    {
        $orm = $this->getOne($request);
        return view("admin.{$this->table}.edit", [$this->table => $orm]);
    }

    public function deleteIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:' . $this->table . ',id',
        ]);

        $model = 'App\\Models\\' . ucfirst($this->table);
        $affectedRows = $model::destroy(Request::get('id'));

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteList(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::get('ids');
        $model = 'App\\Models\\' . ucfirst($this->table);
        $affectedRows = $model::destroy($ids);

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function setOnlyShow($orm)
    {
        if ($orm->show) {
            $model = 'App\\Models\\' . ucfirst($this->table);
            return $model::where('id', '!=', $orm->id)->update(['show' => 0]);
        } else {
            return false;
        }
    }

    /**
     * @param array $heading excel默认表头
     * @param object $query 查询构造器
     */
    protected function exportExcel($heading = [], $query = null)
    {
        if (!$query) {
            $model = 'App\\Models\\' . ucfirst($this->table);
            $query = new $model;
        }

        $inputs = Request::all();
        if (isset($inputs['start']) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $inputs['start'])) {
            $query = $query->where('created_at', '>=', $inputs['start'] . ' 00:00:00');
        }
        if (isset($inputs['end']) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $inputs['start'])) {
            $query = $query->where('created_at', '<=', $inputs['end'] . ' 00:00:00');
        }
        $result = $query->get();
        // var_dump($result);
        // die;

        Excel::create($this->primaryNav, function($excel) use($result, $heading) {
            $excel->setTitle($this->primaryNav);
                $excel->sheet($this->primaryNav, function($sheet) use($result, $heading) {
                if (count($heading)) {
                    $sheet->fromModel($result, null, 'A2', false, false);
                    $sheet->row(1, $heading);
                } else {
                    $sheet->fromModel($result, null, 'A1', false);
                }
            });

        })->download('xls');
    }

    public function getExport()
    {
        return $this->exportExcel($this->fields);
    }
}
