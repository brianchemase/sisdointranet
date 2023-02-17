<?php

namespace App\Http\Controllers;
use App\Models\ClientsData;
use App\Models\LoanData;
use App\Models\BranchData;
use App\Models\ProductsData;
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
        $branches=BranchData::get();
        $products=ProductsData::where('status', '=', 'active')->get();
        //return $products;

        return view('accounts.loanapplication', compact('branches','products')) ;
    }

    public function register_loan_application(Request $request)
    {

       // $input = $request->all();
       // return $input;

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

        //$now = new DateTime();
       // $year = $now->format('Y');
      //  $month = $now->format('m');
       // $day = $now->format('d');
        $rand_num = rand(1, 500);

        //$loan_id = $year . $month . $day . "_" . $rand_num;
        
        $applicationdate =$request->application_date;
        $new_date = str_replace("-", "", $applicationdate);
        $loan_id=$new_date.$rand_num;
        $insuarance_status=$request->insuarance_status;

        if($insuarance_status == "1")
            {$insuarance_amount=$request->insuarance;}
            else{
                $insuarance_amount="0";
            }

        //return $loan_id;

        $new_guarantors = new GuarantorsData;
        $new_guarantors->client_id=$request->id_number;
        $new_guarantors->loan_id=$loan_id;
        $new_guarantors->guarantor_names=$request->fgnames;
        $new_guarantors->guarantor_id_number=$request->fgid;
        $new_guarantors->guarantor_phone=$request->fgphone;
        $new_guarantors->second_guarantor_names=$request->sgnames;
        $new_guarantors->second_guarantor_id_number=$request->sgid;
        $new_guarantors->second_guarantor_phone=$request->sgphone;
        // save guarantors data
        $save_guarantors = $new_guarantors->save();
        if ($save_guarantors){

            $new_loan = new LoanData;
            $new_loan->id_number=$request->id_number;
            $new_loan->application_date=$request->application_date;
            $new_loan->loan_id=$request->$loan_id;
            $new_loan->loan_applied=$request->principleloan;
            $new_loan->loan_status="pending";
        // $new_loan->loan_approved=$request->id_number;
            $new_loan->principle=$request->totalrepayment;// amount expencted to repay
            $new_loan->interest=$request->interest;//interest
            $new_loan->insuarance=$insuarance_amount;//insuarance
            $new_loan->laf=$request->laf;//loan application fee
            $new_loan->monthly_installments=$request->installments;//monthly installments

            $new_loan->registered_by=$request->officer;
            $new_loan->branchcode=$request->branchcode;//code
            $new_loan->product_id=$request->product_id;//product id
            $save_loanapplication= $new_loan->save();

            if ($save_loanapplication){
                return back()->with('success','Loan Application successfully saved. Contact Relevant authorities for approval');
            }


        }
        else{
            return back()->with('error','An error occured. Contact System Admin ');
        }


       // $input = $request->all();
        //return $input;
    }
    public function clients_data_api()
    {
        $clients=DB::table('clients_data')->get();

        return response()->json($clients);
    }
    public function loan_balance($id)
    {
            

        //$id_no=$_GET['q'];
        //$details=$_GET['q'];
      $id_no=$id;
      $details=$id;
      
            $results=DB::table('tbl_loan_repayments')
            ->where('tbl_loan_repayments.id_number',$id_no)
            ->orwhere('phone','LIKE','%'.$details.'%')
            ->orwhere('loan_id','LIKE','%'.$details.'%' )
            ->Join('clients_data as c', 'c.id_number', '=', 'tbl_loan_repayments.id_number')
            ->select ('tbl_loan_repayments.*', 'c.id_number', 'c.first_name', 'c.last_name')
			->orderBy('id', 'desc')
           // ->get();
            ->first();


            

            //return $prev_balance;

            if ($results) {
            
            $running_balance= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->running_balance;
			$client_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->id_number;
			$loan_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->loan_id;
            $prev_balance= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->prev_balance;
			$phone_no= ClientsData::orderBy('id', 'desc')->where('id_number', $details)->first()->phone;
			$client_name= ClientsData::orderBy('id', 'desc')->where('id_number', $details)->first()->first_name;
            
                return response()->json(['results' => $results]);
                
            }
            
            // If the user is not found, return a 404 response
            return response()->json(['error' => 'Data for user if not available'], 404);


           // return response()->json($results);
    }
}
