<?php

namespace App\Http\Controllers\accounts;
use App\Models\ClientsData;
use App\Models\LoanData;
use App\Models\LoanRepayment;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class AccountsController extends Controller
{
    //
    public function index()
    {

		$currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

		// get the last month from the current date
		$lastMonthdate = Carbon::now()->subMonth();

		$lastMonth=$lastMonthdate->month;




        $montly_repayments="";
		$query="";

        //$montly_repayments="250000";
       // $lastMontRepayments="350000";

        
		$mpesa_repayments = DB::table('tbl_loan_repayments')
            ->whereMonth('payment_date', $currentMonth)
            ->whereYear('payment_date', $currentYear)
			->where('mode_of_payment', 'mpesa')
            ->sum('amount');


		$montly_repayments = DB::table('tbl_loan_repayments')
            ->whereMonth('payment_date', $currentMonth)
            ->whereYear('payment_date', $currentYear)
			//->where('mode_of_payment', 'mpesa')
            ->sum('amount');

		$bank_repayments = DB::table('tbl_loan_repayments')
            ->whereMonth('payment_date', $currentMonth)
            ->whereYear('payment_date', $currentYear)
			->where('mode_of_payment', 'bank')
            ->sum('amount');

		$lastMontRepayments = DB::table('tbl_loan_repayments')
            ->whereMonth('payment_date', $lastMonth)
            ->whereYear('payment_date', $currentYear)
			//->where('mode_of_payment', 'mpesa')
            ->sum('amount');

			//return $mpesa_repayments;

		//$montly_repayments=$mpesa_repayments+$bank_repayments;

        $expected_repayment=4000000;
        $pending_repayment=$expected_repayment-($mpesa_repayments+$bank_repayments);

		$totalRepaymentAmount = DB::table('tbl_loan_repayments')->sum('amount');// sum of loan repayments
		$total_loan_issued = DB::table('tbl_loaning')->sum('principle');// sum of loans issued
		$Outstanding_loan_balance = $total_loan_issued-$totalRepaymentAmount;
		//return $Outstanding_loan_balance;

		$clients_counts=ClientsData::count();
		$total_loan_running = LoanData::where('loan_status', 'running')->sum('loan_approved');

		//return $total_loan_running;
		// gender chat start
		$gender_distribution = ClientsData::select(
			DB::raw('SUM(CASE WHEN gender = "male" THEN 1 ELSE 0 END) as total_males'), 
			DB::raw('SUM(CASE WHEN gender = "female" THEN 1 ELSE 0 END) as total_females')
		)
		->get();

			$gender_chat[] = ['Male','Female'];
			foreach ($gender_distribution as $key => $value) {
			$gender_chat[++$key] = ["Male", (int)$value->total_males];
			$gender_chat[++$key] = ["Female", (int)$value->total_females];
			}

			//return $gender_chat;
			//return view ('accounts.chat', compact('gender_chat'));
			// gender chat end

			//line chart start

			$repayments = LoanRepayment::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('payment_date', date('Y'))
                    ->groupBy(DB::raw("Month(payment_date)"))
                    ->pluck('count');

			$repayments = DB::table('tbl_loan_repayments')
                ->select(DB::raw("MONTH(payment_date) AS repayment_month, YEAR(payment_date) AS repayment_year, SUM(amount) AS total_repayments"))
				->whereYear('payment_date', date('Y'))
                ->groupBy(DB::raw("repayment_month, repayment_year"))
                ->orderBy("repayment_year")
                ->orderBy("repayment_month")
				->pluck('total_repayments');
               //->get();

				//return $repayments;

            
        //return view('accounts.barline', compact('repayments'));

		// line chat end


        return view('accounts.home' , 
        compact('montly_repayments', 'lastMontRepayments', 'clients_counts', 
        'mpesa_repayments','bank_repayments','expected_repayment','pending_repayment','gender_chat','repayments','totalRepaymentAmount','Outstanding_loan_balance','total_loan_issued'
    
    ));
    }

	public function newclientregister()
    {
        return view ('accounts.newclient');
    }

    public function tables()
    {
        return view ('accounts.tables');
    }

    public function blank()
    {
        return view ('accounts.blank');
    }

    public function forms()
    {
        return view ('accounts.form');
    }

	public function demand_letter_generation()
    {
        return view ('accounts.demandletterform');
    }

    public function sms()
    {
        // $client_name="Brian";//brian
		// $client_mobile="0725670606";//brian

		//$client_name="Christine";//chirstine
		//$client_mobile="0724991667";//Christine

		$client_name="Shuma";//shuma
		$client_mobile="0794576789";//shuma

		$loan_balance="25000";
		$payment="1500";
		$new_balance=$loan_balance-$payment;


		$message="Dear $client_name, \nWe have received your payment of KES $payment/=.\nYour new loan balance is KES $new_balance/=.\nRegards SISDO";
		//echo $message;
		$apikey="6bffdc7405dd019325db9cfe3ec093e0";
		$shortcode="TextSMS";
		$partnerID="6712";
		$serviceId=0;



			$smsdata=array(
				"apikey" => $apikey,
				"shortcode" => $shortcode,
				"partnerID"=> $partnerID,
				"mobile" => $client_mobile,
				"message" => $message,
				//"serviceId" => $serviceId,
				//"response_type" => "json",
				);
				
			$smsdata_string=json_encode($smsdata);
			//echo $smsdata_string."\n";

			$smsURL="https://sms.textsms.co.ke/api/services/sendsms/";

			//POST
			$ch=curl_init($smsURL);
			curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$smsdata_string);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch,CURLOPT_HTTPHEADER,array(
				'Content-Type: application/json',
				'Content-Length: '.strlen($smsdata_string)
				)	
			);
			$response=curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);

    }
	public function clients_list()
    {


		$clients=DB::table('clients_data')->get();

		//return $clients;

        return view ('accounts.clientstables', compact('clients'));
    }

	public function loaned_list()
	{
		$loaned=DB::select("SELECT l.id_number, c.id_number,c.first_name, c.last_name, l.loan_id, l.loan_applied, l.loan_status, l.loan_approved AS amount_approved , l.approval_by, s.names AS loan_approver from tbl_loaning AS l
		JOIN clients_data AS c
		ON l.id_number=c.id_number 
		JOIN staff AS s
		ON s.id=l.approval_by");

		//return $loaned;

		return view ('accounts.clientsloaned', compact('loaned'));
	}

	public function loaned_clients_data()
	{
		$loaned=DB::select("SELECT * from clients_data_names");

		//return $loaned;

		return view ('accounts.clientsdataloaned', compact('loaned'));
	}

	public function pending_loan_list()
	{
		$loaned=DB::select("
		SELECT l.id_number, c.id_number, c.first_name, c.last_name, l.loan_id, l.application_date, l.loan_applied, 
		l.loan_status, l.principle, l.interest, l.monthly_installments 
		FROM tbl_loaning AS l 
		JOIN clients_data AS c
		ON c.id_number=l.id_number WHERE l.loan_status='pending';
		");

		//return $loaned;

		return view ('accounts.pendingloanlist', compact('loaned'));
	}

	public function savenewclient(Request $request)
	{
		$request->validate([
			'fname'=>'required',
			//'mname'=>'required',
			'lname'=>'required',
			//'email'=>'required|email|unique:clients_data',
			'gender'=>'required',
			'phone'=>'required|unique:clients_data',
			'location'=>'required',
			//'station'=>'required',
			'id_number'=>'required|unique:clients_data|min:5|max:12'
	   ]);

	   if ($request->hasFile('ppt')) {

		$request->validate([
			'image' => 'mimes:png,jpg,jpeg|max:2048' // Only allow .jpg, .bmp and .png file types.
		]);


		 // Save the file locally in the storage/public/ folder under a new folder named /ppts
		 $request->ppt->store('ppts', 'public');




		//Insert data into database
		$new_client = new ClientsData;
		$new_client->first_name = $request->fname;
		$new_client->middle_name = $request->mname;
		$new_client->last_name = $request->lname;
		//$new_client->station = $request->station;
		$new_client->email = $request->email;
		$new_client->phone = $request->phone;
		$new_client->gender = $request->gender;
		$new_client->location = $request->location;
		$new_client->id_number = $request->id_number;
		$new_client->passport = $request->ppt->hashName();
		$save = $new_client->save();

		

		 if($save){
		   //Mail::to($email)->send(new AccountRegistration($fname,$username));
		   return back()->with('success','New client data has been successfuly added to Sisdo Intranet');
		 }else{
			 return back()->with('fail','Something went wrong, try again later or contact system admin');
		 }
	   //return $request;
		}
	}

	public function loan_repayment()
	{

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
            ->select ('tbl_loan_repayments.*', 'c.id_number', 'c.first_name', 'c.last_name')
			->orderBy('id', 'desc')
            ->get();
            $date="";

			$running_balance= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->running_balance;
			$client_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->id_number;
			$loan_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->loan_id;
			$phone_no= ClientsData::orderBy('id', 'desc')->where('id_number','LIKE','%'.$details.'%')->first()->phone;
			$client_name= ClientsData::orderBy('id', 'desc')->where('id_number','LIKE','%'.$details.'%')->first()->first_name;


            return view('accounts.searchpayment', ['results'=>$results], compact('date','running_balance','client_id_no','loan_id_no','phone_no','client_name'));
        }
        else{
            return view('accounts.searchpayment');
        }

		//return view('accounts.searchpayment');
	}

	public function register_loan_repayment(Request $request)
	{
		$request->validate([
			'id_number'=>'required',
			'loan_id'=>'required',
			'phone'=>'required',
			'prev_bal'=>'required',
			'mode_of_payment'=>'required',
			'payment_date'=>'required',
			'amount'=>'required',
			
	   ]);

	   $prev_bal=$request->prev_bal;
	   $payment_received=$request->amount;
	   $new_loan_amount=$prev_bal-$payment_received;
	   $client_name=$request->client_name;
	   $client_mobile=$request->phone;
	   $date_of_payment=$request->payment_date;


	   $interest_amount=0.21*$request->amount;
	   $Principle_amount=0.79*$request->amount;

	  // return $interest_amount;

	   //$date_of_payment = date('Y-m-d');


		//Insert data into database
		$register_payment = new LoanRepayment;
		$register_payment->id_number = $request->id_number;
		$register_payment->loan_id = $request->loan_id;
		$register_payment->prev_balance = $request->prev_bal;
		$register_payment->mode_of_payment = $request->mode_of_payment;
		$register_payment->principle_amount = $Principle_amount;
		$register_payment->interest_amount = $interest_amount;
		$register_payment->amount = $request->amount;
		$register_payment->payment_date = $date_of_payment;
		$register_payment->running_balance = $new_loan_amount;
		$save = $register_payment->save();

		

		 if($save){

			$message="Dear $client_name, \nWe have received your payment of KES $payment_received/=.\nYour new loan balance is KES $new_loan_amount/=.\nRegards SISDO";
		//echo $message;
		$apikey="6bffdc7405dd019325db9cfe3ec093e0";
		$shortcode="TextSMS";
		$partnerID="6712";
		$serviceId=0;



			// $smsdata=array(
			// 	"apikey" => $apikey,
			// 	"shortcode" => $shortcode,
			// 	"partnerID"=> $partnerID,
			// 	"mobile" => $client_mobile,
			// 	"message" => $message,
			// 	//"serviceId" => $serviceId,
			// 	//"response_type" => "json",
			// 	);
				
			// $smsdata_string=json_encode($smsdata);
			// //echo $smsdata_string."\n";

			// $smsURL="https://sms.textsms.co.ke/api/services/sendsms/";

			// //POST
			// $ch=curl_init($smsURL);
			// curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
			// curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
			// curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
			// curl_setopt($ch,CURLOPT_POSTFIELDS,$smsdata_string);
			// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			// curl_setopt($ch,CURLOPT_HTTPHEADER,array(
			// 	'Content-Type: application/json',
			// 	'Content-Length: '.strlen($smsdata_string)
			// 	)	
			// );
			// $response=curl_exec($ch);
			// $err = curl_error($ch);
			// curl_close($ch);

		   return back()->with('success','Loan Repayment successfully registered.');
		 }else{
			 return back()->with('fail','Something went wrong, try again later or contact system admin');
		 }		
	}
	public function search_statement()
	{
		return view('accounts.loanstatements');
	}

	public function client_statement(Request $request)
	{


			// $id_no=$_GET['q'];
            // $details=$_GET['q'];

			$id_no=$request->Customer_data;
			$details=$request->Customer_data;

			// $id_no=32676639;
			// $details="32676639";

           
        
            $results=DB::table('tbl_loan_repayments')
            ->where('tbl_loan_repayments.id_number', 'LIKE','%'.$id_no.'%')
            ->orwhere('phone','LIKE','%'.$details.'%')
            ->orwhere('loan_id','LIKE','%'.$details.'%' )
            ->Join('clients_data as c', 'c.id_number', '=', 'tbl_loan_repayments.id_number')
            ->select ('tbl_loan_repayments.*', 'c.id_number', 'c.first_name', 'c.last_name')
			->orderBy('id', 'asc')
            ->get();
            $date="";
			$client_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->id_number;
			$clientf_name= ClientsData::orderBy('id', 'desc')->where('id_number', $details)->first()->first_name;
			$clientl_name= ClientsData::orderBy('id', 'desc')->where('id_number', $details)->first()->last_name;
			$loan_id_no= LoanRepayment::orderBy('id', 'desc')->where('id_number', $details)->first()->loan_id;
			$client_names=$clientf_name." ".$clientl_name;


			$data = [
				'client_names' => $client_names,
				'loan_id_no' => $loan_id_no,
				'client_id_no' => $client_id_no,
				'officer' => 'System Admin',
				'report_date' => date('d/m/Y h:m:s')
			];

		//return view('reports.loanstatements', $data, compact('results'));

		$pdf = PDF::loadView('reports.loanstatements', $data, compact('results') );
              return $pdf->stream();
	}

	public function generate_demand_letter(Request $request)
	{
		$request->validate([
			'fname'=>'required',
			//'mname'=>'required',
			'lname'=>'required',
			'client_id_no'=>'required',
			'loan_balance'=>'required',
			'loan_penalty'=>'required',
			'date'=>'required',

			//'email'=>'required|email|unique:clients_data',
			//'gender'=>'required',
			//'phone'=>'required|unique:clients_data',
			//'location'=>'required',
			//'station'=>'required',
			//'id_number'=>'required|unique:clients_data|min:5|max:12'
	   ]);



		$client_names=$request->fname." ".$request->mname." ".$request->lname;
		$client_id_no=$request->client_id_no;
		$loan_due=$request->loan_balance;
		$penalty=$request->loan_penalty;
		$officer_names=$request->officer_name;
		$designation=$request->officer_designation;

		

		if($request->demand_no =="1")
		{
			$demand_no="1st";
		}
		elseif($request->demand_no =="2")
		{
			$demand_no="2nd";
		}
		elseif($request->demand_no =="3")
		{
			$demand_no="3rd";
		}
		elseif($request->demand_no =="4")
		{
			$demand_no="4th";
		}
		else{
			$demand_no="";
		}


		//$demand_no="1st";

		$data = [
			'client_names' => $client_names,
			'client_fnames' => $request->fname,
			'demand_no' => $demand_no,
			'loan_due' => $loan_due,
			'penalty' => $penalty,
			'client_id_no' => $client_id_no,
			'officer' => $officer_names,
			'designation' => $designation,
			
			'report_date' => date('d/m/Y')
		];
		//return view ('reports.demandletter');

		// $pdf = PDF::loadView( 'reports.demandletter', 
		// 	compact(
		// 		'startdate','stationname','enddate',
		// 		'amountintext','amountinnumber','positionname',
		// 		'EmployeeNames', 'name' 
		// 		)
		// 	);
			$pdf = PDF::loadView( 'reports.demandletter', $data);
			return $pdf->stream();
	}

	public function demand_letter_page()
	{


		$client_names="JAPHET MUTUGI KIRUKI";
		$client_id_no="28024958";
		$loan_due="32450";
		$penalty="1623";
		$officer_names="George Gitau Muiru";
		$designation="Credit Operations Manager";

		$data = [
			'client_names' => $client_names,
			'loan_due' => $loan_due,
			'penalty' => $penalty,
			'client_id_no' => $client_id_no,
			'officer' => $officer_names,
			'designation' => $designation,
			'report_date' => date('d/m/Y')
		];
		//return view ('reports.demandletter');

		// $pdf = PDF::loadView( 'reports.demandletter', 
		// 	compact(
		// 		'startdate','stationname','enddate',
		// 		'amountintext','amountinnumber','positionname',
		// 		'EmployeeNames', 'name' 
		// 		)
		// 	);
			$pdf = PDF::loadView( 'reports.demandletter', $data);
			return $pdf->stream();
		}
}
