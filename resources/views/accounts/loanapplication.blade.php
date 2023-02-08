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
            
            <form action="{{route('saveloanapplication')}}" method="post" enctype="multipart/form-data">
                @csrf

             <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="idnumber">Client ID</label>
                        <input type="text" class="form-control" name="id_number" placeholder="Share Client ID number">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputAddress">Registering officer</label>
                        <input type="text" class="form-control" id="officer" name="officer" value="{{ Session::get('username')}}" placeholder="{{ Session::get('username')}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Client residence</label>
                        <input type="text" class="form-control" name="location" placeholder="Area of Residence" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">Branch</label>
                    <select name="branchcode" class="form-control">
                        <option selected disabled>Choose Branch...</option>
                        @forelse ($branches as $data)
                            <option value="{{ $data->id }}">{{ $data->branch_name }}</option>
                        @empty
                            <option value="" disabled>No Active Station</option>
                        @endforelse
                                                
                    </select>
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
                        <input type="text" class="form-control" name="fgnames" placeholder="Guarantor's Full names (Mandatory)" onkeyup="this.value = this.value.toUpperCase();" required>
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
                        <input type="text" class="form-control" name="sgnames" placeholder="Guarantor's Full names (Mandatory)" onkeyup="this.value = this.value.toUpperCase();" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="names">Guarantor's Phone</label>
                        <input type="text" class="form-control" name="sgphone" placeholder="Phone number (07xxxxxxxx or 01xxxxxxxx)" required>
                    </div>
                </div>

                <h1 class="h3 mb-4 text-gray-800">Loan Processing</h1>
                <hr>
                

                <div class="form-row" onload="loaning();">
                    <div class="form-group col-md-4">
                        <label for="field">Principle Amount</label>
                        <input type="text" class="form-control" name="principleloan" id="principal" onchange="loaning();" placeholder="Loan Applied">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="field">Insuarance</label>
                        <input type="text" class="form-control" name="insuarance" id="insuarance" placeholder="Insuarance Amount">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="field">Interest</label>
                        <input type="text" class="form-control" name="interest" id="interest" placeholder="Interest to pay">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="field">Loan Application Fee</label>
                        <input type="text" class="form-control" name="laf" id="Loanaf" placeholder="Loan Application Fee">
                    </div>

                    

                <div class="form-group col-md-4">
                    <label for="inputState">Product Category</label>
                    <select name="product_id" class="form-control">
                        <option selected disabled>Choose...</option>
                        @forelse ($products as $data)
                            <option value="{{ $data->id }}">{{ $data->product_name }}</option>
                        @empty
                            <option value="" disabled>No Active Products</option>
                        @endforelse
                        
                    </select>
                 </div>

                 <div class="form-group col-md-4">
                    <label for="inputState">Insuarance Applicable</label>
                    <select name="insuarance_status" class="form-control">
                        <option selected disabled>Choose...</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                 </div>

                 <div class="form-group col-md-4">
                        <label for="email">Loan Application Date</label>
                        <input type="date" class="form-control" name="application_date" placeholder="application Dates">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="field">Monthly Instalments</label>
                        <input type="text" class="form-control" name="installments" id="instalments" placeholder="Loan To repay">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="field">Loan Amount</label>
                        <input type="text" class="form-control" name="totalrepayment" id="totalrepayment" placeholder="Loan To repay">
                    </div>

                    
                </div>
                
                
                <button type="submit" class="btn btn-primary">Register Loan Application</button>
                </form>
                </div>

            </div>
            </div>

            <script>
                function loaning(){
                var p = document.getElementById("principal").value;
                var insu="";
                var interest="";
                if (p <100001)
                {
                    var laf=1000;
                }
                else{
                    var laf=2000;
                }
                
                 var insu= (parseFloat(p)*0.035) +100;
                 var interest=(+p + +insu)*0.21;
                 //console.log(insu);
                    var total_loan=+p + +insu + +interest;
                    var monthly_instalments=(total_loan)/12;
                 document.getElementById("insuarance").value=insu;
                 document.getElementById("interest").value=interest;
                 document.getElementById("Loanaf").value=laf;
                 document.getElementById("totalrepayment").value=total_loan;
                 document.getElementById("instalments").value=monthly_instalments;

                }
            </script>



</div>

</div>
<!-- /.container-fluid -->

@endsection