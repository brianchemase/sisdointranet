<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;
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
}
