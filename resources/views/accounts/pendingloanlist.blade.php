@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">SISDO Pending Loan Applications List</h1>
                    <p class="mb-4">A table showing a list of all pending loan applications made by clients on the SISDO Intranet</p>

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
                                            <th>Application Date</th>
                                            <th>Amount Applied</th>
                                            <th>Status</th>
                                            <th>Amount Approved</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Names</th>
                                            <th>ID Number</th>
                                            <th>LoadID</th>
                                            <th>Application Date</th>
                                            <th>Amount Applied</th>
                                            <th>Status</th>
                                            <th>Amount Approved</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php $no = "1"; ?>
                                            @foreach ($loaned as $data)
                                                <tr>
                                                    <td>{{ $no++ }} </td>
                                                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                    <td>{{ $data->id_number }}</td>
                                                    
                                                    <td>{{ $data->loan_id }}</td>
                                                    <td>{{ $data->application_date }}</td>
                                                    <td>{{ $data->loan_applied }}</td>
                                                    <td>{{ $data->loan_status }}</td>
                                                    <td>
                                                        <a href="#approveloanmodal{{$data->loan_id}}" title="Approve Loan" data-toggle="modal" class="btn btn-success"><i class="fa fa-play"></i> Approve </a>
                                                        <a href="#loanrejectionmodal{{$data->loan_id}}" title="Reject Loan" data-toggle="modal" class="btn btn-danger"><i class="fa fa-stop"></i> Decline </a>
                                                    </td>
                                                    @include('accounts.modals.loanprocessing')
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection