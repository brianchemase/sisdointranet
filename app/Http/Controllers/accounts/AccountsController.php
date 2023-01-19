<?php

namespace App\Http\Controllers\accounts;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    //
    public function index()
    {
        $montly_repayments="";

        $montly_repayments="250000";
        $lastMontRepayments="350000";
        $clients_counts="125";

        $mpesa_repayments=2000000;
        $bank_repayments=1000000;
        $expected_repayment=4000000;
        $pending_repayment=$expected_repayment-($mpesa_repayments+$bank_repayments);






        return view('accounts.home' , 
        compact('montly_repayments', 'lastMontRepayments', 'clients_counts', 
        'mpesa_repayments','bank_repayments','expected_repayment','pending_repayment'
    
    ));
    }

    public function blank()
    {
        return view ();
    }
}
