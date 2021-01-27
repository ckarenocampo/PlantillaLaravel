<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!--<form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>-->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-close" >
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>
          </ul>

          <!--PERFIL-->
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                      <!--USUARIO LOGOUT-->
                    <img alt="Image placeholder" src="{{asset('img/theme/profile-user.png')}}">
                  </span>
                  @if(Session::has('name'))
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{!! session('name') !!}</span>
                  </div>
                  @endif
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right mt-2 ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bienvenido</h6>
                </div>
                <a href="{{ url('/perfil') }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Mi perfil</span>
                </a>
                @if(session('rol')=='1')
                <a href="{{ url('usuarios') }}" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Usuarios</span>
                </a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ url('/logout') }}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Cerrar sesión</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
