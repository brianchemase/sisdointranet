<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Clients Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example bd-example-row">

    <!-- Example Code -->
    <img src="{{public_path('logo/sisdologo.png')}}" alt="logo" width="50" height="60">
    <!-- <img src="{{asset('logo/sisdologo.png')}}" alt="logo" width="50" height="60"> -->

    <img src="https://www.w3schools.com/images/w3schools_green.jpg" alt="W3Schools.com">
    
    <div class="container text-center">
      <div class="row">
        <div class="col">
        <!-- <img src="{{asset('logo/sisdologo.png')}}" alt="W3Schools.com" width="150" height="160"> -->
          Column
        </div>
        
        <div class="col">
            <table>
                <tr>
                    <td><b>Name:</b></td> <td>Brian Chemase</td>
                </tr>
                <tr>
                    <td><b>Station:</b></td> <td>Meru</td>
                </tr>
                <tr>
                    <td><b>Phone:</b></td> <td>0725670606</td>
                </tr>
                <tr>
                    <td><b>Gender:</b></td> <td>Male</td>
                </tr>
            </table>
        </div>
      </div>
      <div class="row">
        <div class="col">
         <b> Guarantors</b>
        </div>
        <table class="table table-sm table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <td>#</td> 
              <td>Names</td> 
              <td>ID Number</td> 
              <td>Phone No</td>
            </tr>
          </thead>
           <tr>
                <td>1</td> 
                <td>Names here</td> 
                <td>1253544</td> 
                <td>0725225225</td>
           </tr>
           <tr>
                <td>2</td> 
                <td>Names here</td> 
                <td>1236652</td> 
                <td>0725225225</td>
          </tr>
         </table>
      </div>

      <div class="row">
        <div class="col">
          Column
        </div>
        <div class="col">
          Column
        </div>
        <div class="col">
          Column
        </div>
      </div>
    </div>

    <p class="mb-2 text-center"><I>Report generated by <b>{{ $officer }}</b> on {{ $report_date }} <br>Report generated from SISDO Intranet </I></p>
    
    <!-- End Example Code -->
  </body>
</html>