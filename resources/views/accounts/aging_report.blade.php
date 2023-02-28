@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
<h1>Aging Report</h1>

<table>
    <tr>
        <th>Aging Period</th>
        <th>Number of Repayments</th>
        <th>Total Amount</th>
    </tr>

    @foreach ($reportData as $name => $data)
        <tr>
            <td>{{ $name }}</td>
            <td>{{ $data['count'] }}</td>
            <td>{{ $data['total'] }}</td>
        </tr>
    @endforeach
</table>

</div>
<!-- /.container-fluid -->

@endsection