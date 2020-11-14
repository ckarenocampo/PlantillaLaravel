
<!DOCTYPE html>
<html>
<!-- Head -->
@include('admin_header')
<body>
@include('admin_sidenav')
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin_topnav')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Perfil</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Perfil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
      
        <div class="col-xl-6">
          <div class="card">
          @if(Session::has('message_success'))
              <div class="alert alert-success alert-block ">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('message_success') !!}</strong>
              </div>
            @endif
            @if(Session::has('message_error'))
              <div class="alert alert-danger alert-block ">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('message_error') !!}</strong>
              </div>
            @endif

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-6">
                  <h3 class="mb-0">Cambiar contraseña </h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <form method="post" action="{{url('/perfil')}}"> @csrf 
              <div id="passContainer pl-6 mr-0" >
                  <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Contraseña actual</label>
                            <input class="form-control" type="password" name="password-actual" id="password-actual" required >
                        </div>
                      </div>
                  </div>
                  
                  <!--   <div class="row">
                  @if(Session::has('message_error'))
                      <div class="col-lg-8">
                        <div class="form-group">
                        <div class="registrationFormAlert form-control-label mt-4" style="color:red;" >{!! session('message_error') !!}</div>
                        </div>
                      </div>
                      @endif
                  </div>-->

                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Contraseña nueva</label>
                        <input class="form-control" value="" type="password" name="password" id="password" required >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Confirmar contraseña nueva</label>
                          <input class="form-control" value="" type="password" name="password-confirmation"  id="password-confirmation" required >
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="registrationFormAlert form-control-label "  id="CheckPasswordMatch"></div>
                    </div>
                  </div>

                </div>
                <div class="text-center">
                  <button type="submit" id="submitPass" class="btn btn-primary mt-4">Actualizar contraseña</button>
                </div>
            </form>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      @include('admin_footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{(' vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{(' vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{(' vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{(' vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{(' vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js ')}}"></script>
  <!-- Argon JS -->
  <script src="{{(' js/argon.js?v=1.2.0 ')}}"></script>
  <!-- JQuery Match Passwords -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#password-confirmation").val();
        if (password != confirmPassword){
          $("#CheckPasswordMatch").html("Contraseñas no coinciden");
          $("#CheckPasswordMatch").css({'color':'red'});
          $('#submitPass').attr("disabled", true);
        }
        else{
          $("#CheckPasswordMatch").html("Contraseñas coinciden");
          $("#CheckPasswordMatch").css({'color':'green'});
          $('#submitPass').attr("disabled", false);

        }
           
    }
    $(document).ready(function () {
       $("#password-confirmation").keyup(checkPasswordMatch);
    });
    </script>
     <!--VIEW PASSWORD JS-->
  <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>