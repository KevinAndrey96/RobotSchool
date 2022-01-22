@extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreProjectSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreProjectSuccess') }}
        </div>
    @endif
    @if(Session::has('UpdaProjectSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UpdaProjectSuccess') }}
        </div>
    @endif
    @if(Session::has('DeleProjectSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleProjectSuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            @if (isset($id))
                Temas
            @else
                Mis temas
            @endif
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="datatable" style="overflow-x:auto;" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                <tr style="text-align: center; padding:10px;">
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr style="text-align: center; padding:10px;">
                                        <td>
                                            <a class="magnific" href="https://miel.robotschool.co/{{$project->icon_url}}">
                                                <img style="width:200px" class="img-thumbnail" src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                            </a>
                                        </td>
                                        <td>{{$project->name}}</td>
                                        <td>
                                            @if ($project->is_enable == 1)
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($id))
                                            <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                @if ($project->is_enable == 1)
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$project->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$project->id}})">
                                                @else
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$project->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$project->id}})">
                                                @endif
                                            </div>
                                            @endif
                                            <div style="display: inline-block" class="justify-content-center" class="btn-group" role="group">
                                                <div style="display:inline-block">
                                                    <a href="detailProject/{{$project->id}}" class="btn btn-success" title="Detalle" style="margin:4px; width:40px;"><i class="fas fa-plus"></i></a>
                                                </div>
                                                @if (! isset($id))
                                                    <div style="display: inline-block">
                                                        <a href="/project/edit/{{$project->id}}" style="margin:3px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                    </div>
                                                    <div style="display: inline-block">
                                                        <form method="POST" action="/project/delete">
                                                            @csrf
                                                            <input type="hidden" name="project_id" value={{ $project->id }}>
                                                            <button style="margin:3px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este tema?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form id="form-status" name="form-status" method="POST" action="/changeStatusProject">
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
                var project_id = document.getElementById("id");
                if (toggle.checked == true) {
                status.value = 1;
                } else {
                status.value = 0;
                }
                project_id.value = id;
                form.submit();
            }
        </script>
    </div>

@endsection
