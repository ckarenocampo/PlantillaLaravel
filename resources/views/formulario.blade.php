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
    <div class="header pb-6 d-flex align-items-center" style="min-height: 150px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
  
    </div>
  <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Agregar nuevo estudiante </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Informacion General</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nombres</label>
                        <input type="text" id="input-name" class="form-control" placeholder="Nombre" value="lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Apellidos</label>
                        <input type="email" id="input-apellidos" class="form-control" placeholder="jesse">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <legend class="form-control-label">Choose your gender:</legend>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-1">
                      <div class="form-group">
                        <label for="male">Male</label>
                      </div>
                    </div>
                    <div class="col-lg-1">
                        <input type="radio" name="gender" id="male" value="male" checked>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-1">
                      <div class="form-group">
                        <label for="male">Female</label>
                      </div>
                    </div>
                    <div class="col-lg-1">
                        <input type="radio" name="gender" id="female" value="male" checked>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                    </div>
                  </div>
                </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Direccion</label>
                        <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Departamento</label>
                        <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Municipio</label>
                        <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Telefono</label>
                        <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Informacion academica</h6>
                <div class="pl-lg-4">
                <div class="row">
                  <div class="form-group">
                    <label class="form-control-label">Selecciona una carrera:</label>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                        <select class="form-control" name="carrers" id="carrers">
                          <option value="sistemas">Ing. en sistemas</option>
                          <option value="industrial">Ing. Industrial</option>
                          <option value="electrica">Ing. Electrica</option>
                          <option value="agronegocios">Ing. Agronegocios</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-8 ">
                  <a href="#!" class="btn btn-sm btn-primary">Save</a>
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
</body>

</html>
