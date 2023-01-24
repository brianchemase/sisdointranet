<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<style>
.table-condensed{
  font-size: 11px;
}

</style>

    <title>Loan Statements</title>
  </head>
  <body>
  <img src="{{asset('logo/sisdologo.png')}}" alt="logo" width="50" height="60">
  
    <h2 class="mb-2 text-center" >Client Loan Statements</h2>
    <P>Loan statement belonging to: {{ $client_names }} as of {{ $report_date }} <br> ID Number {{$client_id_no}} <br> Loan ID {{$client_id_no}}</P>

                  <div class="table-condensed table-sm">
                    <table id="dataTable" class="table table-striped table-sm"  style="width:100%, font-size: 8px;">
                          <thead>
                              <tr>
                                  <th>No</th>  
                                  <th>Client's Names</th>
                                  <th>ID No</th>
                                  <th>LoanID</th>
                                  <th>Payment date</th>
                                  <th>Prev balance</th>
                                  <th>Amount</th>
                                  <th>Paymode</th>
                                  <th>Balance</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                              <?php $no=1 ?> 
                              @foreach ($results as $result)
                      <?php 
                                
                                  $date=$result->payment_date;
                                  $application_date= date_create($date);
                                  $date = date_format($application_date,"d-m-Y ");
                           $status = '';
                           $raw_status='';
                           //$raw_status=$result->ticket_position;
                                if ($raw_status=='1')
                                {
                                    $status='<span class="badge text-bg-info">Waiting</span>';
                                    $buttons='
                                    <button type="button" title="Start Service" data-toggle="modal" data-target="#startservicemodal" class="btn btn-info"><i class="fa fa-play" aria-hidden="true"></i></button> 
                                
                                    ';
                                    // <span class="badge text-bg-warning">Started</span>
                                }
                                elseif($raw_status=='2')
                                {
                                    $status='<span class="badge text-bg-warning">Started</span>';
                                    $buttons='
                                    <button type="button" title="End Service" class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    ';
                                } 
                                elseif($raw_status=='3')
                                    {
                                        $status='<span class="badge text-bg-success">Completed</span>';
                                        $buttons='
                                        
                                        
                                        ';
                                    }
                                
                              
                              ?> 
                              <tr class="odd gradeX"> 
                                  <td> {{$no++}}</td>    
                                  
                                  <td> {{ $result->first_name}} {{ $result->last_name}}</td>
                                  <td> {{ $result->id_number}}</td>
                                  <td> {{ $result->loan_id}}</td>
                                  <td> <?php echo $date;?></td>
                                  <td> {{ $result->prev_balance}}</td>
                                  <td> {{ $result->amount}}</td>
                                  <td> {{ $result->mode_of_payment}}</td>
                                  <td> {{ $result->running_balance}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                          <tfoot>
                              <tr> 
                                  <th>No</th>  
                                  <th>Client's Names</th>
                                  <th>ID No</th>
                                  <th>LoanID</th>
                                  <th>Payment date</th>
                                  <th>Prev balance</th>
                                  <th>Amount</th>
                                  <th>Paymode</th>
                                  <th>Balance</th>
                              </tr>
                          </tfoot>
                      </table>
                  </div>
                  <p class="mb-2 text-center"><I>Report generated by <b>{{ $officer }}</b> on {{ $report_date }} <br>Report generated from SISDO Intranet </I></p>
                  
              
          
          

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>