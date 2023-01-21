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
            
                <form>
                
             

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
                    <select id="inputState" class="form-control">
                        <option selected disabled>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                 </div>
                    
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>





                </form>
                </div>

            </div>
            </div>



</div>

</div>
<!-- /.container-fluid -->

@endsection