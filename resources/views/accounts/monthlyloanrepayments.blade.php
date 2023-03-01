@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">SISDO Monthly Loan Repayments</h1>
                    <p class="mb-4">A table showing a list of all monthly loans on the SISDO Intranet .</p>

                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">

                                    <form class="form-inline" method="GET" action="{{route('monthlyloanrepaymentlist')}}">
                                    

                                    <label class="sr-only" for="inlineFormInputGroupUsername2">Month</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Month</div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <select class="form-control" name="m" id="exampleFormControlSelect1">
                                            <option value="1">1 {{ \Carbon\Carbon::createFromDate(null, 1, null)->format('F') }}</option>
                                            <option value="2">2 {{ \Carbon\Carbon::createFromDate(null, 2, null)->format('F') }}</option>
                                            <option value="3">3 {{ \Carbon\Carbon::createFromDate(null, 3, null)->format('F') }}</option>
                                            <option value="4">4 {{ \Carbon\Carbon::createFromDate(null, 4, null)->format('F') }}</option>
                                            <option value="5">5 {{ \Carbon\Carbon::createFromDate(null, 5, null)->format('F') }}</option>
                                            <option value="6">6 {{ \Carbon\Carbon::createFromDate(null, 6, null)->format('F') }}</option>
                                            <option value="7">7 {{ \Carbon\Carbon::createFromDate(null, 7, null)->format('F') }}</option>
                                            <option value="8">8 {{ \Carbon\Carbon::createFromDate(null, 8, null)->format('F') }}</option>
                                            <option value="9">9 {{ \Carbon\Carbon::createFromDate(null, 9, null)->format('F') }}</option>
                                            <option value="10">10 {{ \Carbon\Carbon::createFromDate(null, 10, null)->format('F') }}</option>
                                            <option value="11">11 {{ \Carbon\Carbon::createFromDate(null, 11, null)->format('F') }}</option>
                                            <option value="12">12 {{ \Carbon\Carbon::createFromDate(null, 12, null)->format('F') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <label class="sr-only" for="inlineFormInputGroupUsername2">Year</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Year</div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <select class="form-control" name="y" id="exampleFormControlSelect1">
                                            <option>2022</option>
                                            <option>2023</option>
                                            
                                            </select>
                                        </div>
                                    </div>

                                   


                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SISDO Monthly loan Repayments list for {{ \Carbon\Carbon::createFromDate(null, $current_month, null)->format('F') }}, {{$current_year}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Names</th>
                                            <th>ID Number</th>
                                            <th>LoadID</th>
                                            <th>Client Contact</th>
                                            <th>Last Payment Date</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Names</th>
                                            <th>ID Number</th>
                                            <th>LoadID</th>
                                            <th>Client Contact</th>
                                            <th>Last Payment Date</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                            @foreach ($running_loans as $data)
                                                <tr>
                                                    <td> {{ $loop->iteration }}</td>
                                                    <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
                                                    <td>{{ $data->id_number }}</td>
                                                    <td>{{ $data->loan_id }}</td>
                                                    <td>{{ $data->phone }}</td>
                                                    <td> {{ \Carbon\Carbon::parse($data->payment_date)->format('d-m-Y') }}</td>
                                                    <td>{{ number_format($data->amount) }}</td>
                                                    <td>{{ number_format($data->running_balance) }}</td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection