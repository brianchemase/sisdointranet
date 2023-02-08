@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">
 <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">SISDO STAFF LIST</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

<div class="container">


                            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Register Staff
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Sisdo Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <div class="row">
            <div class="col">
            <input type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Last name">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
            <input type="text" class="form-control" placeholder="email Address">
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="phone">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
            <input type="text" class="form-control" placeholder="Branch">
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Department UNIT">
            </div>
        </div>
        </form>
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</div>
<br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Active Stafflist</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Station</th>
                                            <th>Dept</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Station</th>
                                            <th>Dept</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                    @foreach ($stafflist as $data)
                                                <tr>
                                                    <td>{{ $data->id }} </td>
                                                    <td>{{ $data->names }}</td>
                                                    <td>{{ $data->username }}</td>
                                                    
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->phone }}</td>
                                                    <td>{{ $data->dept }}</td>
                                                    <td>{{ $data->station }}</td>
                                                    <td></td>
                                                </tr>
                                            @endforeach

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection