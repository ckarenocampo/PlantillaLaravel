<!DOCTYPE html>
<html>
  <?php
  use \App\Http\Controllers\ConsultasController;
  ?>
<!-- Header -->
@include('admin_header')
<body>
                 
  <!-- Sidenav -->
  @include('admin_sidenav')
    <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin_topnav')
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Principal</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Principal</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total estudiantes</h5>
                      <span class="h2 font-weight-bold mb-0">{{$cont['estudiantes']}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> %645</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total inscritos</h5>
                      <span id="countInscritos" class="h2 font-weight-bold mb-0">{{$cont['inscritos']}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Masculinos</h5>
                      <span class="h2 font-weight-bold mb-0">{{$cont['masculino']}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Femeninos</h5>
                      <span class="h2 font-weight-bold mb-0">{{$cont['femenino']}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
                       
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Visitas a las páginas </h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre de la pagina</th>
                    <th scope="col">Visitas</th>
                    <th scope="col">Porcentaje</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      /admin
                    </th>
                    <td>
                      <?php
                      include("views_admin.php");
                      echo $views;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> {{ConsultasController::porcentajes('0')}} %
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /perfil
                    </th>
                    <td>
                      <?php
                      $vperfil = "views_perfil.txt";
                      $viewsperfil = (int)file_get_contents($vperfil);
                      echo $viewsperfil;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> {{ConsultasController::porcentajes('1')}} %
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /usuarios
                    </th>
                    <td>
                      <?php
                      $vusuarios = "views_usuarios.txt";
                      $viewsusuarios = (int)file_get_contents($vusuarios);
                      echo $viewsusuarios;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> {{ConsultasController::porcentajes('2')}} %
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /estudiantes
                    </th>
                    <td>
                      <?php
                      $vestudiantes = "views_estudiantes.txt";
                      $viewsestudiantes = (int)file_get_contents($vestudiantes);
                      echo $viewsestudiantes;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> {{ConsultasController::porcentajes('3')}} %
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /inscripciones
                    </th>
                    <td>
                      <?php
                      $vinscripciones = "views_inscripciones.txt";
                      $viewsinscripciones = (int)file_get_contents($vinscripciones);
                      echo $viewsinscripciones;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> {{ConsultasController::porcentajes('4')}} %
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /aprobadosporciclo
                    </th>
                    <td>
                      <?php
                      $vapciclo = "views_aprobadosporciclo.txt";
                      $viewsapciclo = (int)file_get_contents($vapciclo);
                      echo $viewsapciclo;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> {{ConsultasController::porcentajes('5')}} %
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /inscripcionesporciclo
                    </th>
                    <td>
                      <?php
                      $vipciclo = "views_inscripcionesporciclo.txt";
                      $viewsipciclo = (int)file_get_contents($vipciclo);
                      echo $viewsipciclo;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> {{ConsultasController::porcentajes('6')}} %
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /retirospormateria
                    </th>
                    <td>
                      <?php
                      $vretirospormateria = "views_retirospormateria.txt";
                      $viewsretiros = (int)file_get_contents($vretirospormateria);
                      echo $viewsretiros;
                      ?>
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> {{ConsultasController::porcentajes('7')}} %
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--AQUI
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Total orders</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
               Chart -->
             <!-- <div class="chart">
                <canvas id="chart-bars" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>-->
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
  <!-- Optional JS -->
  <script src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('js/argon.js?v=1.2.0')}}"></script>
</body>

</html>
