<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISDO DEMAND LETTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        p{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* font-family: 'CustomFont', Arial, sans-serif; */
            font-weight:normal;
            font-style:normal;
            font-size: 16px;
            text-align: justify;
            text-justify: inter-word;
            }
    
    </style>
  </head>
  <body >
    
    <div style="margin:-50;padding:0; width:800px;">

    <img src="{{public_path('logo/sisdo_letterhead.png')}}" alt="logo" width="100%" height="250">
    </div>

    <div style="margin:0;padding:15;">
    <br>
    <br>
       <p><b>{{ $report_date }}<br><br>
       {{ $client_names }} </b><br><br>
       ID No. {{ $client_id_no }} <br><br>
        <b>Dear {{ $client_fnames }},</b>
       
       </p>

    <p > <u><b>REF: {{ $demand_no }} DEMAND LETTER</b></u></p>
    <p align="justify">We are writing in reference to the loan advanced to you by SISDO and payment not being received.</P>
    <p align="justify">We hereby demand your outstanding loan arrears of <b> Ksh. {{ $loan_due }}/=</b>  plus a penalty of <b> Ksh. {{ $penalty }}/=</b> within seven days (7) from the date indicated above. Failure to which we will have no option but to execute recovery measures of the whole outstanding balance both principle and interest plus any other cost which may be incurred without further notice.</P>
    <p align="justify">Also note we reserve the right to commence legal proceedings and this letter may be tendered in court as evidence of your failure to pay.  Legal action may result in you having to pay legal costs, interest and could impact on your credit history. </P>

    <p>Yours sincerely</p>
    <br>
    <br>
    <p>For SISDO</p>
    <p>{{ $officer }}</p>
    <p><b>{{ $designation }}</b></p>

    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>