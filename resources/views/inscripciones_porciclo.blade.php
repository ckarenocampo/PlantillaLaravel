
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
              <div class="col-lg-10 ">
                <h6 class="h2 text-white d-inline-block mb-0">Inscripciones por ciclo</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                    <li class="breadcrumb-item active"><a href="{{url('/estudiantes')}}">Inscripciones por ciclo </a></li>
                  </ol>
                </nav>
              </div>
             <!-- <div class="col-lg-2 col-5 text-right">
                @if(session('rol')=='1')
                  <a href="#"   class="btn btn-sm btn-neutral">Filters</a>
                @endif
              </div>-->
            </div>
          </div>
        </div>
      </div>
        <!-- Page content -->
        <?php
        include("views_inscripcionesporciclo.php");
        ?>
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


            <div id="test" class="table-responsive pt-2 pb-2" style="height:30rem">

                <table id="example" class="table table-striped display nowrap" >
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

      <!--<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>-->

      <script src="{{(' js/jquery.dataTables.js ')}}"></script>

      <script src="{{(' js/dataTables.buttons.js ')}}"></script>
      <!--<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>-->


      <script src="{{(' js/buttons.flash.js')}}"></script>
      <!--<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>-->


      <script src="{{(' js/jszip.js')}}"></script>
      <script src="{{(' js/pdfmake.js')}}"></script>
      <script src="{{(' js/vfs_fonts.js')}}"></script>
      <script src="{{(' js/buttons.html5.js')}}"></script>
      <!--<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>-->


      <script src="{{(' js/buttons.print.js')}}"></script>

      <!-- DATATABLES CSS -->
      <link rel="stylesheet" href="{{('css/jquery.dataTables.css')}}">
      <link rel="stylesheet" href="{{('css/buttons.dataTables.css')}}">

      <!--LOADING-->
      <script src="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.css" rel="stylesheet">

      <script src=" https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>


   <script>

function getData(cb_func) {
        $.ajax({
        url: "{{url('/estudiantesInscritos')}}",
        //url: "estudiantesinscritos.txt",


        success: cb_func
        });
    }

   $(document).ready(function() {
        $("#test").busyLoad("show", {
            text: "Cargando ...",
            spinner: "accordion",
            fontSize: "2rem",
        });
        getData(function( data ) {
            var columns = [];
            data = data;
            columnNames = Object.keys(data[0]);
            for (var i in columnNames) {
            columns.push({data: columnNames[i], title: columnNames[i]});
        }

            $('#example').DataTable( {
                dom: 'Blfrtip',
                "pageLength": 50,
                buttons:[
                         'excel', 'pdf', 'print'
                        ],
                data: data,
                columns: [
                  { "data": function (data, type, dataToSet) {
                      return data.PrimerApellido + " " + data.SegundoApellido + " " + data.PrimerNombre + " " + data.SegundoNombre;
                  }, 'title' : 'Nombre'},
                  {"data": function (data, type, dataToSet){
                      var cadena = data.FechaNacimiento ;
                      cadena = cadena.substr(0,10);
                      return cadena;
                    }, 'title' : 'FechaNac'},


                    { "data": function (data, type, dataToSet) {

                        var cadena = data.FechaNacimiento ;
                        cadena = cadena.substr(0,4);
                        //obtener el year actual
                        var today = new Date();
                        var date = today.getFullYear();
                        return date- cadena;
                    }, 'title' : 'Edad'},
                    {'data' : 'CodigoEstudiante' , 'title' : 'CodigoEstudiante'},
                    {'data' : 'Genero', 'title' : 'Genero'},
                    {'data' : 'IdCarrera', 'title' : 'Carrera'},
                    {'data' : 'TipoIngreso', 'title' : 'Tipo Ingreso'},
                   
                    {'data' : 'NombreMateria', 'title' : 'NombreMateria'},
                    {'data' : 'NombreDocente' , 'title' : 'NombreDocente'},
                    {'data' : 'Grupo' , 'title' : 'Grupo'},
                    {'data' : 'Ciclo' , 'title' : 'Ciclo' },
                    {'data' : 'Matricula' , 'title' : 'Matricula'},
                    {'data' : 'Dia' , 'title' : 'Dia'},
                    {'data' : 'Turno' , 'title' : 'Turno'},
                    {'data' : 'Horario' , 'title' : 'Horario'},
                   
                    {"data": function (data, type, dataToSet){
                      var cadena = data.FechaInscripcion ;
                      cadena = cadena.substr(0,10);
                      return cadena;
                    }, 'title' : 'FechaInscripcion'},
                    
                    {'data' : 'PlanVersion', 'title' : 'PlanVersion'},
                    {'data' : 'Cum', 'title' : 'Cum'}
                    
                ],
                rowsGroup: [0,1,2,3,4,5,6],

                initComplete: function () {
                    $('#example thead tr').clone(true).appendTo( '#example thead' );

                    this.api().columns().every( function () {

                        var column = this;

                        var select = $('</br><select><option value=""></option></select>')
                        .appendTo( $('#example thead tr:eq(1) th').eq(column.index()).empty())
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' );
                        });
                    });
                }

            });
            var element = document.getElementById("test");
            element.removeAttribute("style");
            $("#test").busyLoad("hide");

        });
    });
    </script>
  </body>
</html>
