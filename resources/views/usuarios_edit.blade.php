<!DOCTYPE html>
<html>
<!-- Head -->
@include('admin_header')
<body>
  <!-- Navbar -->
  @include('admin_sidenav')
  <!-- Main content -->
  <div class="main-content"  id="panel">
    <!-- Topnav -->
    @include('admin_topnav')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-2">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Usuarios</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active"><a href="{{url('/usuarios')}}">Usuarios</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ url('usuarios') }}" class="btn btn-sm btn-neutral">Atrás</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="col-xl-8 order-xl-1">
        <div class="card">
        @if(Session::has('message_error'))
              <div class="alert alert-success alert-block ">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('message_error') !!}</strong>
              </div>
            @endif
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="heading-small text-muted mb-0">Editar un usuario </h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" id="formEdit" name="formEdit"  action="{{url('/usuarios/'.$usuarios['id'])}}" enctype="multipart/form-data" role="form">
                
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Nombre</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" value="{{$usuarios['name']}}" type="text" name="name" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-control-label" for="input-email">Correo electrónico</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" value="{{$usuarios['email']}}" type="email" name="email">
                  </div>
                </div>

                <div class="form-group">                  
                  <label class="form-control-label" for="input-rol">Rol del usuario</label>
                  <div class="input-group input-group-merge input-group-alternative">
                  <select class="form-control" name="rol_id">
                  @foreach($roles as $rol)
                  <option value="{{$rol['id']}}"  {{ $usuarios['rol_id'] == $rol['id'] ? 'selected="selected"' : '' }}>{{$rol['name_rol']}}</option>
                  @endforeach 
                  </select>
                  </div>
                </div>

                <!-- Reestablecer Contraseña -->
                <div class="form-group">
                  <label class="heading-small text-muted mb-2">Reestablecer Contraseña </label>
                  <input class="form-control-checkbox" onclick="myFunction()" type="checkbox" id="checkPass" name="checkPass">
                  <hr class="my-0" />
                </div>

                <div id="passContainer" >
                  <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Contraseña actual</label>
                            <input class="form-control"  disabled="true" type="password" name="password-actual" id="password-actual" required>
                        </div>
                      </div>
                  </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Contraseña nueva</label>
                          <input class="form-control"  disabled="true" type="password" name="password" id="password" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Repetir contraseña nueva</label> 
                          <input class="form-control" disabled="true" type="password" name="password-confirmation"  id="password-confirmation" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="registrationFormAlert form-control-label" id="CheckPasswordMatch"></div>
                      </div>
                    </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
        <!-- Footer -->
        @include('admin_footer')
      </div>
    </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('js/argon.js?v=1.2.0')}}"></script>

  <!-- Check cambiar password-->
  <script>
        function myFunction() {
            
            var checker = document.getElementById('checkPass'); 
            var passActual = document.getElementById('password-actual'); 
            var passNew = document.getElementById('password'); 
            var passConf = document.getElementById('password-confirmation'); 
            //var formulario = document.getElementById('formEdit'); 
            // when unchecked or checked, run the function 
            checker.onchange = function(){ 
              if(this.checked){ 
                passActual.disabled = false; 
                passNew.disabled = false; 
                passConf.disabled = false; 
           
              }
              else { 
                passActual.disabled = true; 
                passNew.disabled = true; 
                passConf.disabled = true; 
              } 
            } 
        }
    </script>
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


</body>

</html>