@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">New Loan Application</h1>


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
            
            <form action="{{route('saveclientdata')}}" method="post" enctype="multipart/form-data">
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

                
                <h1 class="h3 mb-4 text-gray-800">First Guarantor Details</h1>
                <hr>


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="names">Guarantor's ID </label>
                        <input type="text" class="form-control" name="fgid" placeholder="Guarantor's ID Number (Mandatory)" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="names">Guarantor's Full Names</label>
                        <input type="text" class="form-control" name="fgnames" placeholder="Guarantor's Full names (Mandatory)" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="names">Guarantor's Phone</label>
                        <input type="text" class="form-control" name="fgphone" placeholder="Phone number (07xxxxxxxx or 01xxxxxxxx)" required>
                    </div>
                </div>

                <h1 class="h3 mb-4 text-gray-800">Second Guarantor Details</h1>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="names">Guarantor's ID </label>
                        <input type="text" class="form-control" name="sgid" placeholder="Guarantor's ID Number (Mandatory)" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="names">Guarantor's Full Names</label>
                        <input type="text" class="form-control" name="sgnames" placeholder="Guarantor's Full names (Mandatory)" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="names">Guarantor's Phone</label>
                        <input type="text" class="form-control" name="sgphone" placeholder="Phone number (07xxxxxxxx or 01xxxxxxxx)" required>
                    </div>
                </div>

                <h1 class="h3 mb-4 text-gray-800">Loan Processing</h1>
                <hr>
                

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="field">Principle Amount</label>
                        <input type="text" class="form-control" name="principleloan" placeholder="Loan Applied">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="field">Insuarance</label>
                        <input type="text" class="form-control" name="insuarance" placeholder="Insuarance Amount">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="field">Interest</label>
                        <input type="text" class="form-control" name="interest" placeholder="Interest to pay">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="field">Loan Application Fee</label>
                        <input type="text" class="form-control" name="laf" placeholder="Loan Application Fee">
                    </div>

                    

                <div class="form-group col-md-4">
                    <label for="inputState">Product Category</label>
                    <select name="gender" class="form-control">
                        <option selected disabled>Choose...</option>
                        <option value="livestock">Livestock</option>
                        <option value="farminputs">Farm Inputs</option>
                        <option value="biogass">Bio gas</option>
                    </select>
                 </div>

                 <div class="form-group col-md-4">
                        <label for="email">Loan Application Date</label>
                        <input type="date" class="form-control" name="application_date" placeholder="application Dates">
                    </div>

                    
                </div>
                
                
                <button type="submit" class="btn btn-primary">Register Loan Application</button>
                </form>
                </div>

            </div>
            </div>



</div>

</div>
<!-- /.container-fluid -->

@endsection