@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">New Client Registration Page</h1>


<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
                <form action="{{route('saveclientdata')}}" method="post">
                @csrf

             <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="idnumber">Client ID</label>
                        <input type="text" class="form-control" name="id_number" placeholder="Share Client ID number">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputAddress">Registering officer</label>
                        <input type="text" class="form-control" id="officer" placeholder="System Admin" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">residence</label>
                        <input type="text" class="form-control" name="location" placeholder="Area of Residence">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="names">First Name </label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name (Mandatory)">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="names">Middle Name</label>
                        <input type="text" class="form-control" name="mname" placeholder="Middle Name (optional)">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="names">Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name (Mandatory)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone number (07xxxxxxxx or 01xxxxxxxx)">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Client's Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Share Email">
                    </div>

                <div class="form-group col-md-4">
                    <label for="inputState">Gender</label>
                    <select name="gender" class="form-control">
                        <option selected disabled>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                 </div>
                    
                </div>
                
                <button type="submit" class="btn btn-primary">Register client</button>
                </form>
                </div>

            </div>
            </div>



</div>

</div>
<!-- /.container-fluid -->

@endsection