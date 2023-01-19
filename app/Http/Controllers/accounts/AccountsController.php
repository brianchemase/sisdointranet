<?php

namespace App\Http\Controllers\accounts;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    //
    public function index()
    {
        return view('layouts.accounts.home');
    }

    public function blank()
    {
        return view ();
    }
}
