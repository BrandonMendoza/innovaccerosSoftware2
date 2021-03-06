@extends('adminlte::page')

@section('title', 'Inn Software')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Proveedores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{URL('/home')}}">Inicio</a></li>
              <li class="breadcrumb-item">Proveedores</li>
            </ol>
          </div>
        </div>
      </div>
@stop
@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            
          </div>

          <div class="card-tools">
            <a href="/proveedor/crear" class="btn btn-flat btn-default"><i class="fas fa-plus mr-2"></i>Agregar</a>
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table id="tablaPrincipal" class="table table-hover text-nowrap table-striped projects">
            <thead>
              <tr>
                <th>#</th>
                <th data-orderable="false"></th>
                <th>Nombre</th>
                <th>Sucursal</th>
                <th>Categoria</th>
                <th data-orderable="false">E-mail</th>
                <th data-orderable="false">Telefono</th>
                <th data-orderable="false"></th>
              </tr>
            </thead>
            <tbody> 
              @foreach($proveedores as $proveedor)
                <tr>
                  <td>  
                    {{ $loop->index+1 }}
                  </td>
                  <td>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <img alt="Avatar" class="table-avatar" data-lazysrc="{{ asset('uploads/DocProveedores/'.$proveedor->foto) }}">
                      </li>
                    </ul>
                  </td>
                  <td>{{ $proveedor->nombre  }}</td>
                  <td>{{ $proveedor->sucursal }}</td>
                  <td>{{ $proveedor->categoria }}</td>
                  <td>{{ $proveedor->email }}</td>
                  <td>{{ $proveedor->telefono  }}</td>
                  <td style="text-align: right;">
                    <div class="btn-group">
                      <a class="btn btn-flat btn-info" href="" style="text-decoration:none;">
                        <i class="far fa-eye"></i>
                      </a>
                      <a class="btn btn-flat btn-danger" href="" style="text-decoration:none;"><i class="fas fa-trash-alt"></i>
                      </a>
                    </div>
                  </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@stop

@section('scripts')

  <script>  
    $(document).ready(function () { 
        var table = $('#tablaPrincipal').DataTable({
                  "paging": true,
                  //"lengthChange": false,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
                  "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                  }
              });
    });

 

    function ReLoadImages(){
        $('img[data-lazysrc]').each( function(){
            //* set the img src from data-src
            $( this ).attr( 'src', $( this ).attr( 'data-lazysrc' ) );
            }
        );
    }

    document.addEventListener('readystatechange', event => {
        if (event.target.readyState === "interactive") {  //or at "complete" if you want it to execute in the most last state of window.
            ReLoadImages();
        }
    });
  </script>


@stop