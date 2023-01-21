@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">SISDO Loaning Clients lIST</h1>
                    <p class="mb-4">A table showing a list of all loaned clients on the SISDO Intranet <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SISDO CLIENT LIST</h6>
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
                                            <th>Amount Applied</th>
                                            <th>Status</th>
                                            <th>Amount Approved</th>
                                            <th>Approval officer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Names</th>
                                            <th>ID Number</th>
                                            <th>LoadID</th>
                                            <th>Amount Applied</th>
                                            <th>Status</th>
                                            <th>Amount Approved</th>
                                            <th>Approval officer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                            @foreach ($loaned as $data)
                                                <tr>
                                                    <td> </td>
                                                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                    <td>{{ $data->id_number }}</td>
                                                    
                                                    <td>{{ $data->loan_id }}</td>
                                                    <td>{{ $data->loan_applied }}</td>
                                                    <td>{{ $data->loan_status }}</td>
                                                    <td>{{ $data->amount_approved }}</td>
                                                    <td>{{ $data->loan_approver }}</td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection