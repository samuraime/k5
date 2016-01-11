<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Session;
use App\Models\User;

class AdminIndexController extends AdminController
{
    public $primaryNav = '首页';

    public function getIndex()
    {
        return redirect('/admin/summary');
        // return view('admin.index.index', [
        //     'stat' => $this->stat(),
        //     'secondaryNav' => '数据概况',
        // ]);
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
}
