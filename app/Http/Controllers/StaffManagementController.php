<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
use App\Models\HistoryLog;
use Illuminate\Support\Facades\DB;

class StaffManagementController extends Controller
{
    //
    public function staff_list()
    {
        $stafflist=staff::get();
        //return $stafflist;


        return view('accounts.stafflist', compact('stafflist'));
    }
    public function history_logs()
    {
        $history_logs=historylog::orderBy('id','desc')->get();

        return view('accounts.historylogs', compact('history_logs'));
    }
}
