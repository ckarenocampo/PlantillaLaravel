 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner" >
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" data-action="sidenav-close">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="/img/brand/USO.png" class="navbar-brand-img" data-action="sidenav-close">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/admin') }}" >
                <i class="ni ni-tv-2 text-blue"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/perfil') }}" class="nav-link"  >
                <i class="ni ni-single-02 text-blue"></i>
                <span class="nav-link-text">Mi perfil</span>
              </a>
            </li>

            @if(session('rol')=='1')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('usuarios') }}" >
                  <i class="ni ni-bullet-list-67 text-blue"></i>
                  <span class="nav-link-text">Gestión de Usuarios</span>
                </a>
              </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" href="{{ url('estudiantes') }}" >
                <i class="ni ni-bullet-list-67 text-blue"></i>
                <span class="nav-link-text">Reporte Estudiantes</span>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('inscripciones') }}" >
                  <i class="ni ni-bullet-list-67 text-blue"></i>
                  <span class="nav-link-text">Reporte Inscripciones</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('aprobadosporciclo') }}" >
                  <i class="ni ni-bullet-list-67 text-blue"></i>
                  <span class="nav-link-text">Aprobados por Ciclo</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('inscripcionesporciclo') }}" >
                  <i class="ni ni-bullet-list-67 text-blue"></i>
                  <span class="nav-link-text">Inscripciones por Ciclo</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('retirospormateria') }}" >
                  <i class="ni ni-bullet-list-67 text-blue"></i>
                  <span class="nav-link-text">Retiros por Materia</span>
                </a>
              </li>


          </ul>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Otros sitios web</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://www.usonsonate.edu.sv/" target="_blank">
                <i class="ni ni-book-bookmark"></i>
                <span class="nav-link-text">Universidad</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://portal.microsoftonline.com/" target="_blank">
                <i class="ni ni-email-83"></i>
                <span class="nav-link-text">Correo Institucional</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://sinapsis.usonsonate.edu.sv/login/index.php" target="_blank">
                <i class="ni ni-hat-3"></i>
                <span class="nav-link-text">Aula Virtual</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
