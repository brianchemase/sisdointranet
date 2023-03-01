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
use Carbon\Carbon;

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
    public function running_loans()
    {
        $running_loans1=DB::select("
		SELECT t1.id_number, t1.loan_id, t1.prev_balance, t1.payment_date, t1.mode_of_payment,
        t1.amount, t1.running_balance, c.id_number, c.first_name, c.last_name, c.phone
        FROM tbl_loan_repayments AS t1
        JOIN clients_data AS c
            ON c.id_number=t1.id_number
            INNER JOIN (
            SELECT loan_id, MAX(id) AS max_id
            FROM tbl_loan_repayments
            GROUP BY loan_id
            ) t2
            ON t1.loan_id = t2.loan_id AND t1.id = t2.max_id
            
            ORDER BY t1.loan_id, t1.id;

		");

       // return $running_loans;

        $running_loans = DB::table('tbl_loan_repayments as t1')
            ->join('clients_data as c', 'c.id_number', '=', 't1.id_number')
            ->join(DB::raw('(SELECT loan_id, MAX(id) AS max_id FROM tbl_loan_repayments GROUP BY loan_id) as t2'), function ($join) {
                $join->on('t1.loan_id', '=', 't2.loan_id')
                     ->on('t1.id', '=', 't2.max_id');
            })
            ->select('t1.id_number', 't1.loan_id', 't1.prev_balance', 't1.amount as amount', 't1.mode_of_payment', 't1.payment_date', 't1.running_balance', 'c.id_number', 'c.first_name', 'c.last_name', 'c.phone')
            ->where('t1.running_balance', '>', 0)
            //->orderBy('t1.running_balance')
            ->orderBy('t1.id')
            ->orderBy('t1.loan_id')
            ->get();


            return view ('accounts.runningloans', compact('running_loans'));
        
    }
    public function monthly_loan_repayments()
    {
        if(isset($_GET['m']))
        {
         
            $filter_month=$_GET['m'];
            $filter_year=$_GET['y'];

            $current_month= $filter_month;
            $current_year = $filter_year;

            //return $current_year;


        } else{

            $current_month = date('m');
            //$current_month = 2;
            $current_year = date('Y');
            //return $current_year;
        }

       
        
        // $running_loans = DB::table('tbl_loan_repayments as t1')
        //     ->join('clients_data as c', 'c.id_number', '=', 't1.id_number')
        //     ->join(DB::raw('(SELECT loan_id, MAX(id) AS max_id FROM tbl_loan_repayments GROUP BY loan_id) as t2'), function ($join) {
        //         $join->on('t1.loan_id', '=', 't2.loan_id')
        //              ->on('t1.id', '=', 't2.max_id');
        //     })
        //     ->select('t1.id_number', 't1.loan_id', 't1.prev_balance', 't1.amount as amount', 't1.mode_of_payment', 't1.payment_date', 't1.running_balance', 'c.id_number', 'c.first_name', 'c.last_name', 'c.phone')
        //     ->where('t1.running_balance', '>', 0)
        //     ->whereYear('t1.payment_date', '=', $current_year)
        //     ->whereMonth('t1.payment_date', '=', $current_month)
        //     ->orderBy('t1.id')
        //     ->orderBy('t1.loan_id')
        //     ->get();

 $running_loans = DB::table('tbl_loan_repayments as l')
    ->join('clients_data as c', 'c.id_number', '=', 'l.id_number')
    ->select('l.id_number', 'c.phone as phone' , 'c.first_name', 'c.last_name', 'l.loan_id', 'l.prev_balance as running_balance', 'l.amount as amount', 'l.mode_of_payment', 'l.payment_date')
   // ->whereBetween('l.payment_date', ['2023-03-01', '2023-03-31'])
    ->whereYear('l.payment_date', '=', $current_year)
    ->whereMonth('l.payment_date', '=', $current_month)
    ->orderBy('l.id')
    ->orderBy('l.loan_id')
    ->get();

    //return $running_loans;
        
            return view ('accounts.monthlyloanrepayments', compact('running_loans' , 'current_month', 'current_year' ));
        
    }
    public function loan_repayments_summary()
    {
        $monthly_payment_data=LoanRepayment::selectRaw('MONTH(payment_date) AS repayment_month, YEAR(payment_date) AS repayment_year, SUM(amount) AS total_repayments')
			->groupBy('repayment_month', 'repayment_year')
			->orderBy('repayment_year', 'desc')
			->orderBy('repayment_month', 'desc')
			->get();

        return view ('accounts.loanrepaymentstable', compact('monthly_payment_data'));
    }
    public function loan_disbusment_summary()
    {
        $monthly_loaning_data=LoanData::selectRaw('MONTH(approval_date) AS disbusment_month, YEAR(approval_date) AS disbusment_year, SUM(loan_approved) AS total_loans')
			->groupBy('disbusment_month', 'disbusment_year')
			->orderBy('disbusment_year', 'desc')
			->orderBy('disbusment_month', 'desc')
			->get();

        return view ('accounts.loandisbusmenttable', compact('monthly_loaning_data'));
    }
    public function search_entry()
    {

       
        //$clients=DB::table('clients_data')->get();

        $clients=DB::table('tbl_loan_repayments AS l')
        ->join('clients_data AS c', 'c.id_number', '=', 'l.id_number')
        ->where('l.running_balance', '>', 1)
        ->select('l.id_number', 'c.first_name', 'c.middle_name', 'c.last_name', 'l.loan_id')
        ->groupBy('l.loan_id')
        ->groupBy('l.loan_id', 'l.id_number', 'c.first_name', 'c.middle_name', 'c.last_name')
        ->orderBy('c.first_name')
        ->get();
    
        if(isset($_GET['q']))
        {
         
            $id_no=$_GET['q'];
            $details=$_GET['q'];

			//return $details;
        
            $results=DB::table('tbl_loan_repayments')
            ->where('tbl_loan_repayments.id_number', 'LIKE','%'.$id_no.'%')
            ->orwhere('phone','LIKE','%'.$details.'%')
            ->orwhere('loan_id','LIKE','%'.$details.'%' )
            ->Join('clients_data as c', 'c.id_number', '=', 'tbl_loan_repayments.id_number')
            ->where('tbl_loan_repayments.running_balance', '>', 1)
            ->select ('tbl_loan_repayments.*', 'c.id_number', 'c.first_name', 'c.last_name')
			->orderBy('id', 'desc')
            ->get();
            $date="";

			$running_balance= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->running_balance;
			$client_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->id_number;
			$loan_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->loan_id;
			$phone_no= ClientsData::orderBy('id', 'desc')->where('id_number','LIKE','%'.$details.'%')->first()->phone;
			$client_name= ClientsData::orderBy('id', 'desc')->where('id_number','LIKE','%'.$details.'%')->first()->first_name;


            return view('accounts.filterpaymenttab', ['results'=>$results], compact( 'clients','date','running_balance','client_id_no','loan_id_no','phone_no','client_name'));
        }
       // return view('accounts.filterpageblank',compact('clients'));

        else{
            return view('accounts.filterpaymenttab',compact('clients'));
        }
    }

    public function generate_aging_report()
    {
        // Define aging periods
        $agingPeriods = [
            '30 days' => 30,
            '60 days' => 60,
            '90 days' => 90,
            'Over 90 days' => 91 // This represents all repayments that are more than 90 days overdue
        ];

        // Retrieve loan repayment data
        $loanRepayments = DB::table('tbl_loan_repayments')
            ->select('amount', 'amount', 'payment_date')
            ->get();

        // Calculate aging
        $currentDate = Carbon::now();
        $agingData = [];
        foreach ($loanRepayments as $repayment) {
            $aging = $currentDate->diffInDays(Carbon::parse($repayment->payment_date));
            foreach ($agingPeriods as $name => $days) {
                if ($aging <= $days) {
                    $agingData[$name][] = $repayment;
                    break;
                }
            }
        }

        // Group data and calculate totals
        $reportData = [];
        foreach ($agingPeriods as $name => $days) {
            $reportData[$name] = [
                'count' => count($agingData[$name]),
                'total' => collect($agingData[$name])->sum('amount')
            ];
        }

        // Display report
       // foreach ($reportData as $name => $data) {
       //     echo "{$name}: {$data['count']} repayments, total amount: {$data['total']}<br>";
       // }

        return view('accounts.aging_report', compact('reportData'));

    }

    public function generate_client_aging_report()
    {
        // Get loan repayments and group by client
            $loanRepayments = DB::table('tbl_loan_repayments')
            ->join('clients_data', 'tbl_loan_repayments.id_number', '=', 'clients_data.id_number')
            ->select('tbl_loan_repayments.*', 'clients_data.first_name', 'clients_data.middle_name', 'clients_data.last_name')
            ->orderBy('clients_data.first_name')
            ->get()
            ->groupBy('first_name');

            // Define aging periods and report data array
            $agingPeriods = array(
            '0-30 Days' => 30,
            '31-60 Days' => 60,
            '61-90 Days' => 90,
            'Over 90 Days' => PHP_INT_MAX,
            );

            $reportData = array();

            // Calculate report data for each client separately
            foreach ($loanRepayments as $clientName => $repayments) {
            // Initialize report data for this client
            $clientReportData = array();
            foreach ($agingPeriods as $periodName => $periodDays) {
                $clientReportData[$periodName] = array(
                    'count' => 0,
                    'total' => 0,
                );
            }

            // Calculate report data for each repayment
            foreach ($repayments as $repayment) {
                $daysAgo = Carbon::parse($repayment->payment_date)->diffInDays();
                foreach ($agingPeriods as $periodName => $periodDays) {
                    if ($daysAgo <= $periodDays) {
                        $clientReportData[$periodName]['count']++;
                        $clientReportData[$periodName]['total'] += $repayment->amount;
                        break;
                    }
                }
            }

            // Add report data for this client to the overall report data array
            $reportData[$clientName] = $clientReportData;
            }

            // Return report data to view
            return view('accounts.clientaging_report', ['reportData' => $reportData]);

        
    }
    

}
