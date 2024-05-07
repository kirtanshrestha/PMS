<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('preventBackHistory');

    }
    public function index()
    {
        $arr = DB::select('select count(id) as count from insides');
        $cap = $arr[0]->count;

        $capmsg = 'Capacity: ' . $cap . '/10';
        $table = DB::select('select * from driveins');

        $msg = ['capmsg' => $capmsg, 'susmsg' => '', 'data' => $table];
        // dd($msg);
        return view('dashboard/history', $msg);

        
    }
}
