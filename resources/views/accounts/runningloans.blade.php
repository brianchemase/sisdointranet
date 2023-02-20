@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">SISDO Running Loans lIST</h1>
                    <p class="mb-4">A table showing a list of all running loans on the SISDO Intranet .</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SISDO RUNNING LOANS LIST</h6>
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
                                                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                    <td>{{ $data->id_number }}</td>
                                                    <td>{{ $data->loan_id }}</td>
                                                    <td>{{ $data->phone }}</td>
                                                    <td>{{ $data->payment_date }}</td>
                                                    <td>{{ $data->amount }}</td>
                                                    <td>{{ $data->running_balance }}</td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection