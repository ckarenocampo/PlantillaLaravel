
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
            <div class="row align-items-center py-2">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Usuarios</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active"><a href="{{url('/usuarios')}}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                @if(session('rol')=='1')
                  <a href="{{url('/usuarios_agregar')}}" class="btn btn-sm btn-neutral">Agregar</a>
                  <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- Page content -->
        <br />
        <div class="container-fluid mt--7">
          <div class="card  " >
          @if(Session::has('success'))
              <div class="alert alert-success alert-block ">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('success') !!}</strong>
              </div>
            @endif
            @if(Session::has('message_error'))
              <div class="alert alert-success alert-block ">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('message_error') !!}</strong>
              </div>
            @endif
            <!-- Light table -->
            <div class="table-responsive pt-2 pb-2">
          
                <table id="example" class="table table-striped display nowrap" >
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($usuarios as $usuarios)
                  <tr>
                    <td>{{$usuarios['id']}}</td>
                    <td>{{$usuarios['name']}}</td>
                    <td>{{$usuarios['email']}}</td>
                    <td><a href="{{url('/usuarios/'. $usuarios['id'].'/edit')}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form action="{{action('UsuariosController@destroy', $usuarios['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm ('Desea borrar este usuario?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
              <!-- Card footer -->
              <!-- <div class="card-footer py-4">
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
              </div>-->
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
     <!-- DATATABLES JS -->

      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="{{(' js/jquery.dataTables.js ')}}"></script>
      <script src="{{(' js/dataTables.buttons.js ')}}"></script>
      <script src="{{(' js/buttons.flash.js')}}"></script>
      <script src="{{(' js/jszip.js')}}"></script>
      <script src="{{(' js/pdfmake.js')}}"></script>
      <script src="{{(' js/vfs_fonts.js')}}"></script>
      <script src="{{(' js/buttons.html5.js')}}"></script>
      <script src="{{(' js/buttons.print.js')}}"></script>
      <!-- DATATABLES CSS -->
      <link rel="stylesheet" href="{{('css/jquery.dataTables.css')}}">
      <link rel="stylesheet" href="{{('css/buttons.dataTables.css')}}">

   <script>
   $("body").ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 </script>  
  </body>
</html>