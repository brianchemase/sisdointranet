@extends('accounts.inc.master')

@section('title','Dashboard')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Loan Repayments (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">KES {{number_format($montly_repayments)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Loan Repayments (last Month)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">KES {{number_format($lastMontRepayments)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Clients List</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($clients_counts)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

 <!-- Content Column -->
 <div class="col-lg-12 mb-4">

        

<!-- Color System -->
<div class="row">
    <div class="col-lg-3 mb-4">
        <div class="card bg-primary text-white shadow">
            <div class="card-body">
                
                <div class="text-white-50 small">Month's Mpesa Repayment</div>
                {{number_format($mpesa_repayments)}}
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card bg-success text-white shadow">
            <div class="card-body">
            <div class="text-white-50 small">Month's Bank Repayment</div>
                {{number_format($bank_repayments)}}
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card bg-info text-white shadow">
            <div class="card-body">
            <div class="text-white-50 small">Day's Expected Repayment</div>
                {{number_format($expected_repayment)}}
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card bg-warning text-white shadow">
            <div class="card-body">
            <div class="text-white-50 small">Day's Pending Repayment</div>
                {{number_format($pending_repayment)}}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-info text-white shadow">
            <div class="card-body">
            <div class="text-white-50 small">Loan Repayments</div>
                {{number_format($totalRepaymentAmount)}}
                
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-secondary text-white shadow">
            <div class="card-body">
            <div class="text-white-50 small">Outstanding Loan Balance</div>
                {{number_format($Outstanding_loan_balance)}}
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-info text-white shadow">
            <div class="card-body">
            <div class="text-white-50 small">Total Interest waiver</div>
                {{number_format($interestwaiver)}}
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-light text-black shadow">
            <div class="card-body">
            <div class="text-black-50 small"> <b>Total Loans Disbused</b> </div>
                {{number_format($total_loan_issued)}}
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-dark text-white shadow">
            <div class="card-body">
            <div class="text-white-50 small">Total Loan Application Fee</div>
            {{number_format($totalLafCollected)}}
                
            </div>
        </div>
    </div>
</div>

</div>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
  
        var data = google.visualization.arrayToDataTable({{ Js::from($gender_chat) }});
  
        var options = {
          title: 'Client Gender Distribution Chart',
          is3D: true,
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('gender_distribution'));
        chart.draw(data, options);
      }
    </script>
        <div class="col-xl-12 col-lg-5">
        <div class="card shadow mb-4" >
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Client Gender Distribution Chart</h6>
            </div>
            <div class="card-body">
                <div id="gender_distribution" style="width: 900px; height: 500px;" ></div>
            </div>
        </div>
    </div>
        

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Client Loan Repayments Distribution Chart</h6>
            </div>
            <div class="card-body">
            <div id="LoanRepaymentsMonthly"></div>
            @include('accounts.barline')
            </div>
        </div>
        <script type="text/javascript">
                var repayments =  {{ Js::from($repayments) }};
            
                Highcharts.chart('LoanRepaymentsMonthly', {
                    title: {
                        text: 'Loan Repayment for the Year, 2023'
                    },
                    subtitle: {
                        text: 'Source: Sisdo Intranet Database'
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Loan Repayments Amount'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'Loan Repayments',
                        data: repayments
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
            });
            </script>

<div class="row">

<div class="col-xl-8 col-lg-7">
    <!-- DataTales repayment -->
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Monthly Loan Repayments Analytics</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Payment</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Payment</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($monthly_payment_data as $data)   
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->repayment_month }} - {{ \Carbon\Carbon::createFromDate(null, $data->repayment_month, null)->format('F') }}</td>
                                            <td>{{ $data->repayment_year }}</td>
                                            <td align="right">{{ number_format($data->total_repayments) }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>


    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                    
                </div>
            </div>
           


        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Default
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Active
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Complete
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        

        <!-- Color System -->
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-12 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="dashboard/img/undraw_posting_photo.svg" alt="...">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a
                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                    constantly updated collection of beautiful svg images that you can use
                    completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                    unDraw &rarr;</a>
            </div>
        </div>
    

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
            </div>
        </div>
         
        <!-- DataTales Example -->
         <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    </div>
</div>

</div>

@endsection