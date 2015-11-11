<?php namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Personnel;
use App\Models\Enterprise;
use App\Models\Log;
use App\Models\Message;
use HttpRequest;
use Request;

class AdminSummaryController extends AdminController
{
    public function getIndex()
    {
        $options = [
            // 'table' => [
            //     'enterprise' => '企业信息',
            //     'personnel' => '人才信息',
            //     'log' => '回访日志',
            //     'message' => '留言记录',
            // ],
            'type' => [
                'line' => '折线图',
                'column' => '柱状图',
                'pie' => '饼状图',
                'scatter' => '散点图',
            ],
            'fields' => [
                'name' => '姓名',
                'gender' => '性别',
                'nationality' => '国籍',
                'degree' => '学历',
            ]
        ];
        return view('admin.summary.index', [
            'stat' => $this->stat(),
            'chart' => $options,
        ]);
    }

    private function stat()
    {
        $tables = ['personnel', 'enterprise', 'log', 'message'];
        $list = [];
        foreach ($tables as $table) {
            $model = 'App\\Models\\' . ucfirst($table);
            $list[$table] = $model::count();
        }

        return $list;
    }

    public function getChart(HttpRequest $request)
    {
        $this->validate($request, [
            'type' => 'required|in:line,bar,column,pie,scatter',
            'table' => 'required|in:personnel,enterprise,log,message',
            'start' => ['regex:/^\d{4}-\d{2}-\d{2}$/'],
            'end' => ['regex:/^\d{4}-\d{2}-\d{2}$/'],
        ]);

        // $chartTypes = ['line', 'bar', 'column', 'pie', 'scatter'];
        // if (!in_array(Request::get('type'), $chartTypes)) {
        //     abort(403);
        // }

        $chartFunc = Request::get('type') . 'Chart';

        return $this->$chartFunc($request);
    }

    private function setInterval($query)
    {
        $inputs = Request::all();
        if (isset($inputs['start']) && !empty($inputs['start'])) {
            $query = $query->where('created_at', '>=', $inputs['start']);
        }
        if (isset($inputs['end']) && !empty($inputs['end'])) {
            $query = $query->where('created_at', '>=', $inputs['end']);
        }

        return $query;
    }

    private function basicChart()
    {
        $inputs = Request::all();
        $dateFormats = [
            'year' => '%Y',
            'month' => '%Y-%m',
            'day' => '%Y-%m-%d',
            'week' => '%W',
        ];

        if (in_array($inputs['category'], array_keys($dateFormats))) {
            $field = 'DATE_FORMAT(created_at, "' . $dateFormats[$inputs['category']] . '")';
        } else {
            $field = $inputs['category'];
        }

        $model = 'App\\Models\\' . ucfirst($inputs['table']);
        $query = $model::select(DB::raw('COUNT(*) AS data, ' . $field . ' AS categories'));
        $query = $this->setInterval($query);

        return $query->groupBy('categories')->get()->toArray();
    }

    private function lineChart(HttpRequest $request)
    {
        $this->validate($request, [
            'category' => 'required|in:year,month,day,week',
        ]);

        $serieData = $this->basicChart();

        return response()->json([
            'categories' => array_column($serieData, 'categories'),
            'data' => array_column($serieData, 'data'),
        ]);
    }

    private function barChart(HttpRequest $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $serieData = $this->basicChart();

        return response()->json([
            'categories' => array_column($serieData, 'categories'),
            'data' => array_column($serieData, 'data'),
        ]);
    }

    private function columnChart(HttpRequest $request)
    {
        return $this->barChart($request);
    }

    private function pieChart(HttpRequest $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $serieData = $this->basicChart();
        foreach ($serieData as &$item) {
            $item = [
                'y' => $item['data'],
                'name' => $item['categories'],
            ];
        }

        return response()->json(['data' => $serieData]);
    }

    private function scatterChart(HttpRequest $request)
    {
        $this->validate($request, [
            'x' => 'required',
            'y' => 'required',
        ]);

        $inputs = Request::all();
        $x = $inputs['x'];
        $y = $inputs['y'];
        $model = 'App\\Models\\' . ucfirst($inputs['table']);
        $query = $model::select(DB::raw($x . ',' . $y));
        $query = $this->setInterval($query);
        $data = $query->get()->toArray();

        return response()->json([
            'data' => array_map(function($item) {
                return array_values($item);
            }, $data),
        ]);
    }

    public function getPersonnel()
    {

    }

    public function getPersonnelByGenderMonth()
    {
        $data = DB::table('personnel')
            ->select(DB::raw('COUNT(id) AS num, gender, DATE_FORMAT(birth, "%m") AS month'))
            ->groupBy('gender')
            ->groupBy(DB::raw('DATE_FORMAT(birth, "%m")'))
            ->orderBy('gender')
            ->orderBy(DB::raw('DATE_FORMAT(birth, "%m")'))
            ->get();

        $maleData = [];
        $femaleData = [];
        foreach ($data as $item) {
            $item->gender == 'male' ? array_push($maleData, $item->num) : array_push($femaleData, $item->num);
        }

        return response()->json(['male' => $maleData, 'female' => $femaleData]);
    }

    public function getPersonnelByGenderHeightWeight()
    {
        $data = DB::table('personnel')
            ->select('gender', 'height', 'weight')
            ->where('height', '>', 100)
            ->where('weight', '<', 150)
            ->orderBy('gender')
            ->get();

        $maleData = [];
        $femaleData = [];
        foreach ($data as $item) {
            $item->gender == 'male' ? array_push($maleData, [$item->height, $item->weight]) : array_push($femaleData, [$item->height, $item->weight]);
        }

        return response()->json(['male' => $maleData, 'female' => $femaleData]);
    }

    public function getPersonnelByOccupation()
    {
        $data = DB::table('personnel')
            ->select(DB::raw('COUNT(*) AS count'), 'occupation')
            ->groupBy('occupation')
            ->get();

        return response()->json($data);
    }
}
