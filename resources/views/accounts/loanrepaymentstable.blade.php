@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">SISDO Loan Monthly Loan Repayments</h1>
                    <p class="mb-4">A table showing a list of all monthly repayment loans on the SISDO Intranet .</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SISDO Monthly Loan Repayments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Payment</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Payment</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($monthly_payment_data as $data)   
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->repayment_month }} - {{ \Carbon\Carbon::createFromDate(null, $data->repayment_month, null)->format('F') }}</td>
                                            <td>{{ $data->repayment_year }}</td>
                                            <td align="right">KES {{ number_format($data->total_repayments) }}/=</td>  
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

@endsection