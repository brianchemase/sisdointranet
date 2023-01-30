@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">SISDO Clients lIST</h1>
                    <p class="mb-4">A table showing a list of all registered clients on the SISDO Intranet <a target="_blank"
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
                                            <th>Mobile No</th>
                                            <th>Client email</th>
                                            <th>Gender</th>
                                            <th>Location</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Names</th>
                                            <th>ID Number</th>
                                            <th>Mobile No</th>
                                            <th>Client email</th>
                                            <th>Gender</th>
                                            <th>Location</th>
                                            <th>Image</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>{{ $client->id }}</td>
                                                    <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                                    <td>{{ $client->id_number }}</td>
                                                    <td>{{ $client->phone }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>{{ $client->gender }}</td>
                                                    <td>{{ $client->location }}</td>
                                                    <td>
                                                    <img src="{{ url('storage/ppts/'.$client->passport) }}"  style="height: 100px; width: 150px;">
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection