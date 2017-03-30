<?php

namespace Jormin\DDoc\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DDocController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据库表名称列表
        $tables = DB::select('SHOW TABLE STATUS ');
        foreach ($tables as $key => $table) {
            //获取改表的所有字段信息
            $columns = DB::select("SHOW FULL FIELDS FROM ".$table->Name);
            $table->columns = $columns;
            $tables[$key] = $table;
        }
        return view('ddoc::index',compact('tables'));
    }
}
