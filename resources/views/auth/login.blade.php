<!-- {{asset('temp/')}} -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('logfiles/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('logfiles/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('logfiles/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('logfiles/css/style.css')}}">

    <title>Login Sisdo Intra</title>
  </head>
  <body>
  

  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('{{asset('logfiles/images/bg_2.jpg')}}');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
              <h3>Login to <strong>SISDO INTRANET</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="{{route('authenticate')}}" method="post">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif



                @csrf
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter Your username" value="{{old('username')}}">
                  <span class="text-danger">@error('username') {{$message}} @enderror<span>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" name="password">
                  <span class="text-danger">@error('password') {{$message}} @enderror<span>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="{{asset('logfiles/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('logfiles/js/popper.min.js')}}"></script>
    <script src="{{asset('logfiles/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('logfiles/js/main.js')}}"></script>
  </body>
</html>