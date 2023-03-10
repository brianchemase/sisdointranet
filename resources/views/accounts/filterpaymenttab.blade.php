@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Filter client for repayment</h1>


<div class="row">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <form class="form-inline" action="{{route('findloanrepaymentsearch')}}" method="GET" autocomplete="off">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <label for="exampleFormControlSelect1">Get Clients Payment </label>
                            <select class="form-control" id="exampleFormControlSelect1" name="q">
                                <option selected disabled>Select Client ...</option>
                                    @forelse ($clients as $data)
                                    <option value="{{ $data->id_number }}">{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }} - {{ $data->loan_id }}</option>
                                    @empty
                                    <option value="" disabled>No Active Loans</option>
                                    @endforelse
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Get Details</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div>
@if(isset($results))

<div class="card-body">           
<!-- modal start -->
<div class="row">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Register Payment
                </button>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Loan Payment Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        
        <form action="{{route('registerrepayment')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="idnumber">Client ID</label>
                <input type="text" class="form-control" name="id_number" placeholder="" value="{{$client_id_no}}">
                <input type="hidden" class="form-control" name="loan_id" placeholder="" value="{{$loan_id_no}}">
                <input type="hidden" class="form-control" name="phone" placeholder="" value="{{$phone_no}}">
                <input type="hidden" class="form-control" name="client_name" placeholder="" value="{{$client_name}}">
            </div>    

            <div class="form-group">
                <label for="prev_bal">Last Balance</label>
                <input type="text" class="form-control" name="prev_bal" placeholder="Prev Balance" value="{{$running_balance}}">
            </div>

            <div class="form-group">
                <label for="payment">Loan Payment Source</label>
                <select name="mode_of_payment" class="form-control">
                    <option selected disabled>Choose...</option>
                    <option value="mpesa">Mpesa</option>
                    <option value="bank">Bank Deposit</option>
                    <option value="interestwaiver">Interest Waiver</option>
                </select>
            </div>

            <div class="form-group">
                <label for="prev_bal">Payment Date</label>
                <input type="date" class="form-control" name="payment_date" placeholder="Payment Date">
            </div>

            <div class="form-group">
                <label for="amount">Amount Paid</label>
                <input type="text" class="form-control" name="amount" placeholder="Amount">
            </div>
   
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register Loan Payment</button>
        </div>
        </div>
    </form>
</div>
</div>

<!-- modal end -->

<div class="card mb-4">
  <div class="card-header"><i class="fa fa-search mr-1"></i>Search Results</div>
  <div class="card-body">
      <div class="table-responsive">
        <table id="dataTable" class="table table-striped"  style="width:100%">
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
                      <td> {{ $result->first_name}} {{ $result->middle_name}} {{ $result->last_name}}</td>
                      <td> {{ $result->id_number}}</td>
                      <td> {{ $result->loan_id}}</td>
                      <td> <?php echo $date;?></td>
                      <td> {{ number_format($result->prev_balance)}}</td>
                      <td> {{ number_format($result->amount)}}</td>
                      <td> {{ $result->mode_of_payment}}</td>
                      <td> {{ number_format($result->running_balance)}}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
@endif

</div>

</div>
<!-- /.container-fluid -->

@endsection