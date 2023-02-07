@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">SISDO DEMAND LETTERS</h1>


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
            
            <form action="{{route('makeDemandLetter')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col">
                    <input type="text" class="form-control" name="fname" placeholder="First name" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="mname" placeholder="Middle name" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="lname" placeholder="Last name" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col">
                    <input type="text" class="form-control" name="client_id_no" placeholder="ID Number">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="loan_balance" placeholder="Outstanding Loan">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="loan_penalty" placeholder="Penalty">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" name="date" placeholder="Date" value="01/27/2023">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="officer_name" placeholder="Officer Names" value="George Gitau Muiru">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="officer_designation" placeholder="designation" value="Credit Operations Manager">
                    </div>
                   
                </div>
                <br>
           
                <button type="submit" class="btn btn-primary">Generate Demand Letter</button>

                </form>
                </div>

            </div>
            </div>



</div>

</div>
<!-- /.container-fluid -->

@endsection