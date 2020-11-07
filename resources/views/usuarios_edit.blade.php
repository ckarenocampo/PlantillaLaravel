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
                  <li class="breadcrumb-item active"><a href="#">Usuarios</a></li>
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
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="heading-small text-muted mb-0">Editar un usuario </h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('/usuarios/'.$usuarios['id'])}}" enctype="multipart/form-data" role="form">
                
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Nombre</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" value="{{$usuarios['name']}}" type="text" name="name">
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
                  <label class="form-control-label" for="input-address">Contraseña</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" value="{{$usuarios['password']}}" type="password" name="password">
                  </div>
                </div>

                <div class="form-group">                  
                  <label class="form-control-label" for="input-rol">Rol del usuario</label>
                  <div class="input-group input-group-merge input-group-alternative">
                  <!--<input class="form-control" value="{{$usuarios['rol_id']}}" type="text" >-->
                  
                  <select class="form-control" name="rol_id">

                  @foreach($roles as $rol)
                  <option value="{{$rol['id']}}"  {{ $usuarios['rol_id'] == $rol['id'] ? 'selected="selected"' : '' }}>{{$rol['name_rol']}}</option>
                  @endforeach 
    
                 
                
                  <!--<select value="{{$usuarios['rol_id']}}" class="form-control" name="rol_id">
                  @foreach($roles as $roles)
                  <option value="{{$roles['id']}}">{{$roles['name_rol']}}</option>
                  @endforeach-->
                  </select>
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
</body>

</html>