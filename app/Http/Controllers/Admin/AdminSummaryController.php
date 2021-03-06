<?php namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Talent;
use App\Models\Enterprise;
use App\Models\Log;
use App\Models\Message;
use HttpRequest;
use Request;

class AdminSummaryController extends AdminController
{
    public $primaryNav = '数据汇总';

    public function getIndex()
    {
        $options = [
            'table' => [
                'talent' => [
                    'name' => '人才信息',
                    'charts' => [
                        'line' => [
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'bar' => [
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                            'name' => '姓名',
                            'gender' => '性别',
                            'nationality' => '国籍',
                            'nation' => '民族',
                            'birth' => '生日',
                            'marital' => '婚姻状况',
                            'birthAddress' => '籍贯',
                            'registeredAddress' => '户口所在地',
                            'politicsStatus' => '政治面貌',
                            'degree' => '最高学历',
                            'professionalTitle' => '职称',
                            'workYear' => '工作经验',
                            'telephone' => '联系电话',
                            'mobile' => '手机号码',
                            'email' => '电子邮箱',
                            'address' => '联系地址',
                            'school1' => '毕业学校1',
                            'major1' => '毕业专业1',
                            'school2' => '毕业学校2',
                            'major2' => '毕业专业2',
                            'school3' => '毕业学校3',
                            'major3' => '毕业专业3',
                            'returnee' => '是否海归',
                            'foreignOffice' => '归国前单位',
                            'office' => '单位',
                            'position' => '职务',
                            'type' => '人才类型',
                            'category' => '人才分类',
                        ],
                        'column' => [
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                            'name' => '姓名',
                            'gender' => '性别',
                            'nationality' => '国籍',
                            'nation' => '民族',
                            'birth' => '生日',
                            'marital' => '婚姻状况',
                            'birthAddress' => '籍贯',
                            'registeredAddress' => '户口所在地',
                            'politicsStatus' => '政治面貌',
                            'degree' => '最高学历',
                            'professionalTitle' => '职称',
                            'workYear' => '工作经验',
                            'telephone' => '联系电话',
                            'mobile' => '手机号码',
                            'email' => '电子邮箱',
                            'address' => '联系地址',
                            'school1' => '毕业学校1',
                            'major1' => '毕业专业1',
                            'school2' => '毕业学校2',
                            'major2' => '毕业专业2',
                            'school3' => '毕业学校3',
                            'major3' => '毕业专业3',
                            'returnee' => '是否海归',
                            'foreignOffice' => '归国前单位',
                            'office' => '单位',
                            'position' => '职务',
                            'type' => '人才类型',
                            'category' => '人才分类',
                        ],
                        'pie' => [
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                            'name' => '姓名',
                            'gender' => '性别',
                            'nationality' => '国籍',
                            'nation' => '民族',
                            'birth' => '生日',
                            'marital' => '婚姻状况',
                            'birthAddress' => '籍贯',
                            'registeredAddress' => '户口所在地',
                            'politicsStatus' => '政治面貌',
                            'degree' => '最高学历',
                            'professionalTitle' => '职称',
                            'workYear' => '工作经验',
                            'telephone' => '联系电话',
                            'mobile' => '手机号码',
                            'email' => '电子邮箱',
                            'address' => '联系地址',
                            'school1' => '毕业学校1',
                            'major1' => '毕业专业1',
                            'school2' => '毕业学校2',
                            'major2' => '毕业专业2',
                            'school3' => '毕业学校3',
                            'major3' => '毕业专业3',
                            'returnee' => '是否海归',
                            'foreignOffice' => '归国前单位',
                            'office' => '单位',
                            'position' => '职务',
                            'type' => '人才类型',
                            'category' => '人才分类',
                        ],
                        'scatter' => [],
                    ],
                ],
                'enterprise' => [
                    'name' => '企业信息',
                    'charts' => [
                        'line' => [
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'bar' => [
                            'type' => '企业类型',
                            'staff_scale' => '员工规模',
                            'operation_scale' => '经营规模',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'column' => [
                            'type' => '企业类型',
                            'staff_scale' => '员工规模',
                            'operation_scale' => '经营规模',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'pie' => [
                            'type' => '企业类型',
                            'staff_scale' => '员工规模',
                            'operation_scale' => '经营规模',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'scatter' => [],
                    ],
                ],
                'log' => [
                    'name' => '访问日志',
                    'charts' => [
                        'line' => [
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'bar' => [
                            'category' => '日志分类',
                            'author' => '日志作者',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'column' => [
                            'category' => '日志分类',
                            'author' => '日志作者',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'pie' => [
                            'category' => '日志分类',
                            'author' => '日志作者',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                    ],
                ],
                'message' => [
                    'name' => '留言记录',
                    'charts' => [
                        'line' => [
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'bar' => [
                            'type' => '留言类型',
                            'name' => '留言者',
                            'checked' => '审核状态',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'column' => [
                            'type' => '留言类型',
                            'name' => '留言者',
                            'checked' => '审核状态',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                        'pie' => [
                            'type' => '留言类型',
                            'name' => '留言者',
                            'checked' => '审核状态',
                            'year' => '创建年份',
                            'month' => '创建年月份',
                            'day' => '创建日期',
                            'week' => '创建星期',
                        ],
                    ],
                ],
            ],
            'type' => [
                'line' => '折线图',
                'bar' => '条形图',
                'column' => '柱状图',
                'pie' => '饼状图',
                'scatter' => '散点图',
            ],
        ];
        return view('admin.summary.index', [
            'chart' => $options,
            'stat' => $this->stat(),
            'secondaryNav' => '数据图表',
        ]);
    }

    private function stat()
    {
        $tables = ['talent', 'enterprise', 'log', 'message'];
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
            'table' => 'required|in:talent,enterprise,log,message',
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
            $query = $query->where('created_at', '<=', $inputs['end']);
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

    // public function getTalentByGenderMonth()
    // {
    //     $data = DB::table('talent')
    //         ->select(DB::raw('COUNT(id) AS num, gender, DATE_FORMAT(birth, "%m") AS month'))
    //         ->groupBy('gender')
    //         ->groupBy(DB::raw('DATE_FORMAT(birth, "%m")'))
    //         ->orderBy('gender')
    //         ->orderBy(DB::raw('DATE_FORMAT(birth, "%m")'))
    //         ->get();

    //     $maleData = [];
    //     $femaleData = [];
    //     foreach ($data as $item) {
    //         $item->gender == 'male' ? array_push($maleData, $item->num) : array_push($femaleData, $item->num);
    //     }

    //     return response()->json(['male' => $maleData, 'female' => $femaleData]);
    // }

    // public function getTalentByGenderHeightWeight()
    // {
    //     $data = DB::table('talent')
    //         ->select('gender', 'height', 'weight')
    //         ->where('height', '>', 100)
    //         ->where('weight', '<', 150)
    //         ->orderBy('gender')
    //         ->get();

    //     $maleData = [];
    //     $femaleData = [];
    //     foreach ($data as $item) {
    //         $item->gender == 'male' ? array_push($maleData, [$item->height, $item->weight]) : array_push($femaleData, [$item->height, $item->weight]);
    //     }

    //     return response()->json(['male' => $maleData, 'female' => $femaleData]);
    // }

    // public function getTalentByOccupation()
    // {
    //     $data = DB::table('talent')
    //         ->select(DB::raw('COUNT(*) AS count'), 'occupation')
    //         ->groupBy('occupation')
    //         ->get();

    //     return response()->json($data);
    // }
}
