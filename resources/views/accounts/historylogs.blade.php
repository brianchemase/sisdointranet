@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">History Logs</h1>
                    <p class="mb-4">A table showing history logs for all sisdo intranet users </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">History Logs</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Station</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                            <th>Date</th>
                                            <th>IP add</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Station</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                            <th>Date</th>
                                            <th>IP add</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($history_logs as $data)
                                        <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $data->staff_id }}</td>
                                        <td>{{ $data->station }}</td>
                                        <td>{{ $data->dept }}</td>
                                        <td>{{ $data->action }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->ip }}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection