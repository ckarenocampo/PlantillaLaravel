<!DOCTYPE html>
<html>
 <!-- Header -->
@include('login_header')
 <!-- Navbar -->
 @include('login_navbar')
<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-secondary py-7 py-lg-8 pt-lg-9">

      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block ">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{!! session('flash_message_error') !!}</strong>
            </div>
          @endif
          @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block ">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{!! session('flash_message_success') !!}</strong>
            </div>
          @endif
          <div class="card bg-secondarylg border-0 mb-0">

            <div class="card-body px-lg-5 py-lg-5">

              <div class="text-center text-muted mb-4">
                <small>Inicio de sesión</small>
              </div>

              <form role="form" method="post" action="{{ url('/')}}"> @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Correo" name="email" id="email" type="email" value="{{ old('email') }}" required autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative  bg-white">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password-field" class="form-control " placeholder="Contraseña" name="password" type="password" required>
                    <span toggle="#password-field" onclick="true" class="fa fa-eye-slash field-icon toggle-password input-group-prepend"></span>
                  </div>
                </div>
                <div>
                <!--<div class="custom-control custom-control-alternative custom-checkbox">-->
                    <input  type="checkbox"  value="lsRememberMe" id="rememberMe" />

                 <!-- <input class="custom-control-input" id="customCheckLogin" type="checkbox">-->
                  <label class=" text-muted mb-2"><small>Recordarme</small> </label>
                </div>

                <div class="text-center">
                  <input type="submit" onclick="lsRememberMe()" value="Iniciar sesión" class="btn btn-primary my-4"/>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('login_footer')
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('js/argon.js?v=1.2.0')}}"></script>
  <!--VIEW PASSWORD JS-->
  <script src="{{asset('js/custom.js')}}"></script>

  <!-- REMEMBERME -->
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>


  <script>
    const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
    }

    function lsRememberMe() {
    if (rmCheck.checked && emailInput.value !== "") {
        localStorage.username = emailInput.value;
        localStorage.checkbox = rmCheck.value;
    } else {
        localStorage.username = "";
        }
    }



  </script>

</body>

</html>
