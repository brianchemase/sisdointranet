<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryLog;
use App\Models\staff;
use Session;

class AuthenticationController extends Controller
{
    //
    public function saveLoginHistoryLog()
        {
            $logdata = staff::where('id', '=', Session::get('loggeduserid'))->first();
            //$fname = $logdata->firstname;
            //$lname = $logdata->lastname;
            //$usernames = $fname . ' ' . $lname;
            $usernames = $logdata->names;
            $station = $logdata->station;
            $remarks = "has logged in the laravel system at ";
            $dept =  $logdata->dept;

            if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else {
                $ip = $_SERVER["REMOTE_ADDR"];
            }

            $logs = new HistoryLog;
            $logs->staff_id = $usernames;
            $logs->station = $station;
            $logs->dept = $dept;
            $logs->action = $remarks;
            $logs->date = date("Y-m-d H:i:s");
            $logs->ip = $ip;
            $save = $logs->save();
        }

    public function logpage()
    {

        return view('auth.login');
    }

    public function checkauth(Request $request)
    {
        $request -> validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $user= staff::where('username','=', $request->username)->first();
        if ($user){
            if(($request->password == $user->password))
            {

                if ($user->dept=='accounts')
                {
                    $request->session()->put('loggeduserid', $user->id);
                    $request->session()->put('username', $user->names);
                    $request->session()->put('station', $user->station);
                    $request->session()->put('dept', $user->dept);
                    ////
                            $logdata=staff::where('id','=', session('loggeduserid'))->first();
                            $usernames = $logdata->names;
                            $station=$logdata->station;
                            $remarks="has logged into the intranet system at ";
                            $dept=session('dept'); 

                         if (!empty($_SERVER["HTTP_CLIENT_IP"]))
							{
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							}
							elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
							{
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							}
							else
							{
							 $ip = $_SERVER["REMOTE_ADDR"];
							} 
                
                            $logs= new HistoryLog;
                            $logs->staff_id=$usernames; 
                            $logs->station= $station;
                            $logs->dept=$dept;
                            $logs->action= $remarks;
                            $logs->date=$date = date("Y-m-d H:i:s");
                            $logs->ip=$ip;
                            $save = $logs->save();
                    ///
                    //saveLoginHistoryLog();
                    return redirect ('accounts');
                }

                elseif ($user->dept=='ICT')
                {
                    $request->session()->put('loggeduserid', $user->id);
                    $request->session()->put('username', $user->names);
                    $request->session()->put('station', $user->station);
                    $request->session()->put('dept', $user->dept);

                    ////
                    $logdata=staff::where('id','=', session('loggeduserid'))->first();
                    $usernames = $logdata->names;
                    $station=$logdata->station;
                    $remarks="has logged into the intranet system at ";
                    $dept=session('dept'); 

                         if (!empty($_SERVER["HTTP_CLIENT_IP"]))
							{
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							}
							elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
							{
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							}
							else
							{
							 $ip = $_SERVER["REMOTE_ADDR"];
							} 
                
                    $logs= new HistoryLog;
                    $logs->staff_id=$usernames; 
                    $logs->station= $station;
                    $logs->dept=$dept;
                    $logs->action= $remarks;
                    $logs->date=$date = date("Y-m-d H:i:s");
                    $logs->ip=$ip;
                    $save = $logs->save();

                    ///
                    //saveLoginHistoryLog();
                    return redirect ('accounts');
                }else {
                    return back()->with('fail', 'Error!, Contact Admin To be mapped correctly .');
                }
                
                

            } else{
                return back()->with('fail', 'Error!, Wrong password. Try Again .');
            }

        } else {
            return back()->with('fail', 'Error, Contact administrator.');
        }

        
    }
    public function logout()
    {
        $logdata=staff::where('id','=', session('loggeduserid'))->first();
        //$fname=$logdata->firstname;
        //$lname=$logdata->lastname;
        $usernames = $logdata->names;
        $station=$logdata->station;
        $remarks="has logged out the laravel system at ";
		$dept=session('dept'); 

                         if (!empty($_SERVER["HTTP_CLIENT_IP"]))
							{
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							}
							elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
							{
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							}
							else
							{
							 $ip = $_SERVER["REMOTE_ADDR"];
							} 
                
                $logs= new HistoryLog;
                $logs->staff_id=$usernames; 
                $logs->station= $station;
                $logs->dept=$dept;
                $logs->action= $remarks;
                $logs->date=$date = date("Y-m-d H:i:s");
                $logs->ip=$ip;
                $save = $logs->save();

        if(session()->has('loggeduserid')){
            session()->pull('loggeduserid');
            session()->pull('username');
            session()->pull('station');
            session()->pull('dept');
            return redirect('/auth/login');
        }

    }

   




}
