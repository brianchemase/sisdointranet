<?php

namespace App\Http\Controllers;
use App\Models\ClientsData;
use App\Models\LoanData;
use App\Models\LoanRepayment;
use App\Models\GuarantorsData;
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

    public function register_loan_application(Request $request)
    {

        /*{
            "_token":"RUfZUr8YcfF5TxbFskIHE2BDoyAYH2yJEfYJNJIi",
            "id_number":"30872167",
            "location":"MERU",
            "fgid":"142252",
            "fgnames":"WA KWANZA",
            "fgphone":"07152225225",
            "sgid":"1552336",
            "sgnames":"THE SECOND",
            "sgphone":"0722522536",
            "principleloan":"4500000",
            "insuarance":"171000",
            "interest":"980910",
            "laf":"2000",
            "gender":"livestock",
            "application_date":"2023-02-01",
            "installments":"470992.5",
            "totalrepayment":"5651910"
        }*/

        $new_guarantors = new GuarantorsData;

        $new_guarantors->client_id=$request->id_number;
        $new_guarantors->guarantor_names=$request->fgnames;
        $new_guarantors->guarantor_id_number=$request->fgid;
        $new_guarantors->guarantor_phone=$request->fgphone;
        $new_guarantors->second_guarantor_names=$request->sgnames;
        $new_guarantors->second_guarantor_id_number=$request->sgid;
        $new_guarantors->second_guarantor_phone=$request->sgphone;

        $save_guarantors = $new_guarantors->save();

        

        $input = $request->all();
        return $input;
    }
}
