@extends('adminlte::page')

@section('title', 'Inn Software')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Empleados</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL('/home')}}">Inicio</a></li>
              <li class="breadcrumb-item">Empleados</li>
            </ol>
          </div>
        </div>
      </div>
@stop
@section('content')
  
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            
          </div>

          <div class="card-tools">
            <a href="/empleado/crear" class="btn btn-flat btn-default"><i class="fas fa-plus mr-2"></i>Agregar</a>
            <a href="/empleado/bajas" class="btn btn-flat btn-default"><i class="fas fa-times-circle mr-2"></i>Empleados Dados de Baja</a>
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table id="tablaPrincipalEmpleados" class="table table-hover text-nowrap table-striped projects">
            <thead>
              <tr>
                <th>#</th>
                <th><!-- FOTO --></th>
                <th>Clave</th>
                <th>Nombre </th>
                <th>Fecha de Nacimiento</th>
                <th>Fecha de Ingreso</th>
                <th>RFC</th>
                <th>CURP</th>
                <th data-orderable="false">INE</th>
                <th data-orderable="false">Acta de Nacimiento</th>
                <th data-orderable="false">Carta de Antecedentes Penales</th>
                <th data-orderable="false"></th>
              </tr>
            </thead>
            <tbody>
               @foreach($empleados as $empleado)
                <tr>
                  <td>  
                    {{ $loop->index+1 }}
                  </td>
                  <td>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <img alt="Avatar" class="table-avatar" data-lazysrc="{{ asset('uploads/DocEmpleados/'.$empleado->clave.'/'.$empleado->foto) }}">
                      </li>
                    </ul>
                  </td>
                  <td>{{ $empleado->clave  }}</td>
                  <td>{{ $empleado->nombre.' '.$empleado->apellido1.' '.$empleado->apellido2  }}</td>
                  <td>{{ $empleado->fecha_nac}}</td>
                  <td>{{ $empleado->fecha_entrada }}</td>
                  <td>{{ $empleado->rfc}}</td>
                  <td>{{ $empleado->curp }}</td>
                  <td class="text-center">
                    <span class="badge {{ $empleado->identificacion == "" ? 'badge-danger' : 'badge-primary' }}">
                      <i class="fas fa-address-card"></i>
                    </span>
                  </td>
                  <td class="text-center">
                    <span class="badge {{ $empleado->acta_nacimiento == "" ? 'badge-danger' : 'badge-primary' }}">
                      <i class="fas fa-id-badge"></i>
                    </span>
                  </td>
                  <td class="text-center">
                    <span class="badge {{ $empleado->carta_no_antecedentes == "" ? 'badge-danger' : 'badge-primary' }}">
                      <i class="fas fa-file-signature"></i>
                    </span>
                  </td>
                  
                  <td class="text-center">
                    <div class="btn-group">
                      <a class="btn btn-flat btn-info" href="{{URL('empleado/'.$empleado->id.'/perfil')}}" style="text-decoration:none;"><i class="far fa-eye"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>

@stop


@section('scripts')

  <script>  
    $(document).ready(function () { 
        var table = $('#tablaPrincipalEmpleados').DataTable({
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