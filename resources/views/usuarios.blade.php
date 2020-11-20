
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
                  <a href="#"   class="btn btn-sm btn-neutral">Filters</a>
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
           
            <!-- Light table -->

            
            <div class="table-responsive pt-2 pb-2">
          
                <table id="example" class="table table-striped display nowrap" >
                <thead>
                  <tr>
                    <th >ID </th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Editar / Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
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
     <!-- DATATABLES JS -->

      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>



     <!-- <script src="{{(' js/jquery.dataTables.js ')}}"></script>-->
      
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
    
  
   var editor;
   $(document).ready(function() {

      
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons:[
                 'copy', 'csv', 'excel', 'pdf', 'print'
                ],
        "ajax": {
                "url": "{{url('/data')}}",
                "dataSrc": ''
                },
        "columns": [  
          { data: 'id' },
          { data: 'name' },
          { data: 'email' },
          {
            defaultContent: '<a href="" class="editor_edit">Editar</a> / <a href="" class="editor_remove">Eliminar</a>'
          }
        ]
      });

    
      editor = new $.fn.dataTable.Editor( {
        "ajax": {
                "url": "{{url('/data')}}",
                "dataSrc": ''
                },
        "table": "#example",
        "fields": [ {
                label: 'ID:',
                name: 'id'
            }, {
                label: 'Nombre:',
                name: 'name'
            }, {
                label: 'Correo:',
                name: 'email'
            }
        ]
    } );

  // Edit record
  $('#example').on('click', 'a.editor_edit', function (e) {
          e.preventDefault();
  
          editor.edit( $(this).closest('tr'), {
              title: 'Edit record',
              buttons: 'Update'
          } );
      } );


    /*
    var table = $('#example').DataTable();
    $("#example").on('click', 'tr', function() {
      var id = table.row(this ).data().id;
      alert( 'Clicked row  '+id );
    });
    
    $("#example").on('click', '#editar', function() {
      var id = table.row(this ).data().id;
      //url = "{{url('/usuarios/id/edit')}}";
      //document.getElementById("editar").href = url;
      alert( 'Clicked row '+id );
    });*/
   

  });

 </script>  
  </body>
</html>