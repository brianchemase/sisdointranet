<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\staff;
use Session;

class AuthenticationController extends Controller
{
    //
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
                    return redirect ('accounts');
                }

                elseif ($user->dept=='ICT')
                {
                    $request->session()->put('loggeduserid', $user->id);
                    $request->session()->put('username', $user->names);
                    $request->session()->put('station', $user->station);
                    $request->session()->put('dept', $user->dept);
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

        if(session()->has('loggeduserid')){
            session()->pull('loggeduserid');
            session()->pull('username');
            session()->pull('station');
            session()->pull('dept');
            return redirect('/auth/login');
        }
    }


}
