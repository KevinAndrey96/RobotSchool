@extends('layouts.dashboard')
@section('content')
    @if(Session::has('updacoordinatorsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updacoordinatorsuccess') }}
        </div>
    @endif
    @if(Session::has('deletecoordinatorsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deletecoordinatorsuccess') }}
        </div>
    @endif
    @if(Session::has('storecoordinatorsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storecoordinatorsuccess') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Coordinadores
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; padding:10px;">Nombre</th>
                                    <th style="text-align: center; padding:10px;">Email</th>
                                    <th style="text-align: center; padding:10px;">Teléfono</th>
                                    <th style="text-align: center; padding:10px;">Estado</th>
                                    <th style="text-align: center; padding:10px;">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coordinators as $coordinator)
                                    <tr style="text-align: center; padding:10px;">
                                        <td>{{$coordinator->name}}</td>
                                        <td>{{$coordinator->email}}</td>
                                        <td>{{$coordinator->phone}}</td>
                                        <td>
                                            @if($coordinator->is_enable == 1)
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>

                                        <td>
                                            <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                @if($coordinator->is_enable == 1)
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$coordinator->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$coordinator->id}})">
                                                @else
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$coordinator->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$coordinator->id}})">
                                                @endif
                                            </div>
                                            <div style="display: inline-block" class="row justify-content-center" class="btn-group" role="group">
                                                <a href="/coordinators/edit/{{$coordinator->id}}" style="margin:4px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                <form method="POST" action="/coordinators/delete">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value={{ $coordinator->id }}>
                                                    <button style="margin:4px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este coordinador?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <form id="form-status" name="form-status" method="POST" action="/changeStatusCoordinator">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="status" id="status">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script>
            function getStatus(id)
            {
                var toggle = document.getElementById("togglestatus"+id);
                var status = document.getElementById("status");
                var form = document.getElementById("form-status");
                var coordinator_id = document.getElementById("id");

                if (toggle.checked == true) {
                    status.value = 1;
                } else {
                    status.value = 0;
                }
                coordinator_id.value = id;
                form.submit();
            }
        </script>
    </div>

@endsection

