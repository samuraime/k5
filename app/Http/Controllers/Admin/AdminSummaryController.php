<?php namespace App\Http\Controllers\Admin;

use DB;

class AdminSummaryController extends AdminController
{
    public function getIndex()
    {
        return view('admin.summary.index');
    }

    public function getPersonnel()
    {

    }

    public function getPersonnelByGenderMonth()
    {
        $data = DB::table('personnel')
            ->select(DB::raw('COUNT(id) AS num, gender, DATE_FORMAT(birth_date, "%m") AS month'))
            ->groupBy('gender')
            ->groupBy(DB::raw('DATE_FORMAT(birth_date, "%m")'))
            ->orderBy('gender')
            ->orderBy(DB::raw('DATE_FORMAT(birth_date, "%m")'))
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
