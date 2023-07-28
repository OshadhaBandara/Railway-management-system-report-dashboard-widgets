

 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RailTrack :: Sign-Up</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



</head>
<body class="body-gray">

  
    <div class="gradient">

      <form action="{{ route('register_user') }}" method="POST">

             @csrf

 <!---->   
         <div class="container wr-signUp py-5">
                  <!--  new use success  & fail message --> 
                  @if (Session::has('success'))
       
                  <div class="alert alert-success">{{Session::get('success')}} </div>
                  
              @endif
      
              @if (Session::has('fail'))
              <div class="alert alert-danegr">{{Session::get('fail')}} </div>
              @endif
      <!--  new use success  & fail message --> 
            <div class="row">
              <div class="col text-center">
                <div id="loginPage-logo"><img src="assets/img/RailTrackLogo.png" /></div>
                <div class="mt-4">
                  <h2>Create an account</h2>
                  <h6>Please enter your details.</h6>
                </div>
              </div>
            </div>
            <div class="row mt-4 mb-3">
              <div class="col-12 col-sm mb-3 mb-sm-0">
                <label for="firstName" class="form-label" >First name </label>
                <input type="text" class="form-control" id="signUpFirst" placeholder="Enter your first name" name="firstName" value="{{old('firstName')}}">
                <span class="text-danger">@error('firstName') {{ $message }} @enderror</span>
              </div>
              <div class="col-12 col-sm">
                <label for="LastName" class="form-label" >Last Name </label>
                <input type="text" class="form-control" id="signUpLast" placeholder="Enter your last name" name="LastName" value="{{old('LastName')}}">
                <span class="text-danger">@error('LastName') {{$message }}@enderror</span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12 col-sm mb-3 mb-sm-0">
                <label for="signUpEmail" class="form-label">Email </label>
                <input type="email" class="form-control" id="signUpEmail" placeholder="Enter your email" name="exampleInputEmail1"  value="{{old('exampleInputEmail1')}}">
                <span class="text-danger">@error('exampleInputEmail1') {{$message }}@enderror</span>
              </div>
{{--               <div class="col-12 col-sm">
                <label for="signUpTel" class="form-label">Telephone</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">+94</span>
                    <input type="text" id="signUpTel" class="form-control" placeholder="Enter your phone number" aria-label="Telephone" aria-describedby="basic-addon1">
                  </div>
              </div> --}}
            </div>
 {{--            <div class="row mb-3">
                <div class="col">
                  <label for="signUpAddress" class="form-label">Address</label>
                  <input type="email" class="form-control w-100" id="signUpAddress" placeholder="Enter your first name">
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12 col-sm mb-3 mb-sm-0">
                  <label for="signUpPass" class="form-label">Create Password </label>
                  <input type="password" class="form-control" id="signUpPass" placeholder="Create a Password" name="exampleInputPassword2">
                  <span class="text-danger">@error('exampleInputPassword2') {{$message }}@enderror</span>
                </div>
                <div class="col-12 col-sm">
                  <label for="signUpPass2" class="form-label" >Confirm Password </label>
                  <input type="password" class="form-control" id="signUpPass2" placeholder="Confirm the Password" name="confirmInputPassword2">
                  <span class="text-danger">@error('confirmInputPassword2') {{$message }}@enderror</span>
                </div>
            </div>
            <div class="row mt-4">
              <div class="col"><button type="submit" class="btn btn-primary w-100">Get started</button></div>
            </div>
            <div class="row mt-3 mt-sm-4">
                <div class="col text-center">Already have an account? <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('login') }}">Login</a></div>
              </div>
        </div>
      </form>
    </div>
  
   <!---->
</body>
</html>