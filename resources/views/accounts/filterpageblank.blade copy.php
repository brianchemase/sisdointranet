@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>


<div class="row">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">

                <form class="form-inline">
                

                <label class="sr-only" for="inlineFormInputGroupUsername2">From</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">From</div>
                    </div>
                    <input type="date" class="form-control" id="inlineFormInputGroupUsername2" placeholder="from">
                </div>

                <label class="sr-only" for="inlineFormInputGroupUsername2">To</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">To</div>
                    </div>
                    <input type="date" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                </div>


                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection