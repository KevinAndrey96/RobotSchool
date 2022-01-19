@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Proyectos
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
                                            <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                @if ($project->is_enable == 1)
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$project->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$project->id}})">
                                                @else
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$project->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$project->id}})">
                                                @endif
                                            </div>
                                            <div style="display: inline-block" class="row justify-content-center" class="btn-group" role="group">
                                                <div style="display:inline-block">
                                                    <a href="detailProject/{{$project->id}}" class="btn btn-success" title="Detalle" style="margin:4px; width:40px;"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection
