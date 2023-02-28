@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
<h1>Aging Report</h1>

<table>
    <thead>
        <tr>
            <th>Client</th>
            <th>Aging Period</th>
            <th>Number of Repayments</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reportData as $clientName => $clientReportData)
            @foreach ($clientReportData as $periodName => $data)
                <tr>
                    @if ($periodName === '0-30 Days')
                        <td rowspan="4">{{ $clientName }}</td>
                    @endif
                    <td>{{ $periodName }}</td>
                    <td>{{ $data['count'] }}</td>
                    <td>{{ $data['total'] }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>


</div>
<!-- /.container-fluid -->

@endsection