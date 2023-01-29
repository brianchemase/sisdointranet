<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Highcharts Example - ItSolutionStuff.com</title>
</head>
   
<body>
<div id="LoanRepaymentsMonthly"></div>
</body>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var users =  {{ Js::from($repayments) }};
   
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
            data: users
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
</html>