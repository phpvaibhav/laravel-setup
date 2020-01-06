<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Laravel - Register</title>
  <!-- Custom fonts for this template-->
  <link href="{!! asset('backend_assets/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{!! asset('backend_assets/css/sb-admin-2.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('backend_assets/toastr/toastr.min.css') !!}" rel="stylesheet">
</head>

<body class="bg-gradient-primary" data-base-url="{{url('/')}}">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="{{url('post-register')}}"  id="form-register" method="POST" >
                 {{ csrf_field() }}
                <div class="form-group">
                 
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="fullName" placeholder="Full Name" value="{{old('fullName')}}">
              
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email Address" value="{{old('email')}}">
                </div>
                <div class="form-group">
                  
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                 
                 
                </div>
                 <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="passwordConfirm" placeholder="Repeat Password">
                  </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                <a href="javascript:void(0);" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="javascript:void(0);" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="/forgot">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="/">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{!! asset('backend_assets/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('backend_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('backend_assets/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
<!-- jquery-validate JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{!! asset('backend_assets/js/sb-admin-2.min.js') !!}"></script>
 
  <script src="{!! asset('backend_assets/toastr/toastr.min.js') !!}"></script>
  <script src="{!! asset('backend_assets/login/login.js') !!}"></script>

</body>

</html>
