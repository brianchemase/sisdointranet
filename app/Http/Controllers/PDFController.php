<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to CodeSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('reports.myPDF', $data);
    
        return $pdf->download('codesolutionstuff.pdf');
    }
    public function client_profile()
    {

        $data = [
            'officer' => 'System Admin',
            'title' => 'title',
            'title' => 'title',
            'title' => 'title',
            'report_date' => date('d/m/Y')
        ];

       // return view('accounts.profile', $data);

        $pdf = PDF::loadView('accounts.profile', $data );
              return $pdf->stream();
    }
}
