<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Session;
use App\Models\User;

class AdminIndexController extends AdminController
{
    public function getIndex()
    {
        return view('admin.index', [
            'stat' => $this->stat(),
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

    public function getReact()
    {
        return view('admin.react-index');
    }
}