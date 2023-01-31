<?php

namespace App\Http\Controllers;
use App\Models\ClientsData;
use App\Models\LoanData;
use App\Models\LoanRepayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoaningController extends Controller
{
    //
    public function confirm_client()
    {

        return view('accounts.clientconfirmation');
    }

    public function client_validation(Request $request)
    {

        $id_no=$request->customer_id;


        //$client_data=DB::select("select * from Client_data where ");

        $results1=DB::table('clients_data')
            ->where('clients_data.id_number', '=',$id_no)
            ->select ('clients_data.*')
            ->get();


            $results = ClientsData::select("*")
            ->where("id_number", "=", $id_no)
            ->get();
        


        if(!$results){
            return back()->with('error','Client not registered. Register the Client first ');
            return $results;
           

            //return redirect ('accounts');
           // return back()->with('success','New client data has been successfuly added to Sisdo Intranet');
          }else{
              return back()->with('error','Client not registered. Register the Client first ');
          }

        return view('');
    }

    public function loan_application_form()
    {

        return view('accounts.loanapplication');
    }
}
