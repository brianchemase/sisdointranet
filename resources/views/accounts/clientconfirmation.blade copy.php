@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Loan Application Step 1</h1>

<div class="container-fluid">

<div id="content" class="p-4 p-md-4 pt-2">
        <h2 class="mb-4 text-center" >Confirm Clients Data </h2>
        <br/>
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

        <br/>
</div>
</div>

</div>
<!-- /.container-fluid -->

@endsection