
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
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

    <div class="container-fluid mt--6">
      <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Usuarios</h3>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Contra</th>
                
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($usuarios as $usuarios)
                  
                    <tr>
                      <td>{{$usuarios['id']}}</td>
                      <td>{{$usuarios['name']}}</td>
                      <td>{{$usuarios['email']}}</td>
                      <td>{{$usuarios['password']}}</td>
                      
                      <td><a href="{{action('UsuariosController@edit', $usuarios['id'])}}" class="btn btn-warning">Edit</a></td>
                      <td>
                        <form action="{{action('UsuariosController@destroy', $usuarios['id'])}}" method="post">
                          @csrf
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                  <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                          <i class="fas fa-angle-left"></i>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">
                          <i class="fas fa-angle-right"></i>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
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

  </body>
</html>