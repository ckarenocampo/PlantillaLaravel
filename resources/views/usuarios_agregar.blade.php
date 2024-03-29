<!DOCTYPE html>
<html>
<!-- Head -->
@include('admin_header')
<body>
<!-- Navbar -->
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
          <div class="row align-items-center py-2">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Usuarios</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active"><a href="{{url('/usuarios')}}">Usuarios</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                </ol>
              </nav>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  <!-- Page content -->
    <div class="container align-items-center mt--6">

        <div class="col-xl-12 order-xl-1 ">
        @if(Session::has('flash_message_error'))
              <div class="alert alert-danger alert-block ">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_error') !!}</strong>
              </div>
            @endif
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="heading-small text-muted mb-0">Agregar nuevo usuario </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="{{action('UsuariosController@store')}}" enctype="multipart/form-data" role="form">
               @csrf
               <div class="form-group">
                <label class="form-control-label" for="input-username">Nombre</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3"> 
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input  class="form-control"  type="text" name="name" id="name" placeholder="Nombre" required >
                  </div>
                </div>
                <div class="form-group">
                  <div class="registrationFormAlert form-control-label" id="RevName"></div>
                </div>
                        
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Correo electrónico</label>
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control"  type="email" name="email" id="email" placeholder="usuario@example.com" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-control-label" for="input-address">Contraseña</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control"  type="password" name="password" id="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="registrationFormAlert form-control-label" id="RevPassword"></div>
                </div>
                
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Confirmar contraseña nueva</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" type="password" name="password-confirmation"  id="password-confirmation" required >
                  </div>
                </div>
                <div class="form-group">
                  <div class="registrationFormAlert form-control-label" id="CheckPasswordMatch"></div>
                </div>

                <div class="form-group">                  
                  <label class="form-control-label" for="input-rol">Seleccione el rol del usuario</label>
                  <div class="input-group input-group-merge input-group-alternative">
                  <select class="form-control" name="rol_id" id="rol_id">
                  @foreach($roles as $roles)
                    <option value="{{$roles['id']}}">{{$roles['name_rol']}}</option>
                  @endforeach
                  </select>
                  </div>
                </div>

                <div class=" text-center">
                  <button type="submit" id="submitPass"  class="btn btn-primary mt-4">Guardar</button>
                  <a href="{{ url('usuarios') }}" class="btn btn-danger mt-4">Cancelar</a>
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
  <script src="{{(' vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{(' vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{(' vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{(' vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{(' vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js ')}}"></script>
  <!-- Argon JS -->
  <script src="{{(' js/argon.js?v=1.2.0 ')}}"></script>
    <!-- JQuery Match Passwords -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{('js/passwordsMatch.js')}}"></script>
         <!--VIEW EYE PASSWORD JS-->
  <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
<script>

$("input#password").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
$("input#password-confirmation").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
$("input#email").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
$("input#name").on({
  keydown: function() {
    this.value = this.value.replace(/  +/g, ' ');
  }
});


$("#name").keyup(checkNameMax);
function checkNameMax() {
  var name = $("#name").val(); 

  if (name.length < 3){
    $("#RevName").html("El nombre debe contener al menos 3 caracteres");
    $("#RevName").css({'color':'red'});
    $('#submitPass').attr("disabled", true);
  }
  else{
    $("#RevName").html("");
    $('#submitPass').attr("disabled", false);
  }      
}

</script>
