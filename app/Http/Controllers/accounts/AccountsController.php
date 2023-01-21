<?php

namespace App\Http\Controllers\accounts;
use App\Models\ClientsData;
use App\Models\LoanData;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    //
    public function index()
    {
        $montly_repayments="";
		$query="";

        $montly_repayments="250000";
        $lastMontRepayments="350000";
       // $clients_counts="125";

        $mpesa_repayments=2000000;
        $bank_repayments=1000000;
        $expected_repayment=4000000;
        $pending_repayment=$expected_repayment-($mpesa_repayments+$bank_repayments);



		$clients_counts=ClientsData::count();

		$total_loan_running = LoanData::where('loan_status', 'running')->sum('loan_approved');

		//return $total_loan_running;

        return view('accounts.home' , 
        compact('montly_repayments', 'lastMontRepayments', 'clients_counts', 
        'mpesa_repayments','bank_repayments','expected_repayment','pending_repayment'
    
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
}
