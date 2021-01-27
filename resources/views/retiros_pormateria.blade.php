
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
              <div class="col-lg-10 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Inscripciones por alumno</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                    <li class="breadcrumb-item active"><a href="{{url('/estudiantes')}}">Inscripciones por alumno </a></li>
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
      <script src="{{(' js/buttons.flash.js')}}"></script>
      <script src="{{(' js/jszip.js')}}"></script>
      <script src="{{(' js/pdfmake.js')}}"></script>
      <script src="{{(' js/vfs_fonts.js')}}"></script>
      <script src="{{(' js/buttons.html5.js')}}"></script>
      <script src="{{(' js/buttons.print.js')}}"></script>

      <!-- DATATABLES CSS -->
      <link rel="stylesheet" href="{{('css/jquery.dataTables.css')}}">
      <link rel="stylesheet" href="{{('css/buttons.dataTables.css')}}">

      <!--LOADING-->
      <script src="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.css" rel="stylesheet">



   <script>

function getData(cb_func) {
        $.ajax({
        url: "{{url('/estudiantesInscritos')}}",


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
                        'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                data: data,
                columns: columns,

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
