@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header pb-0 px-3 text-center">
                                <h6 class="mb-0">{{$project->name}}</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">Detalle del tema</h6>
                                            <span class="mb-2 text-xs">Tipo: <span class="text-dark font-weight-bold ms-sm-2">
                                                    @if ($project->theme_type == 'theme')
                                                        Tema
                                                    @else
                                                        Proyecto
                                                    @endif
                                                </span></span>
                                            <span class="mb-2 text-xs">Categoría: <span class="text-dark ms-sm-2 font-weight-bold">{{$project->subcategory->category->name}}</span></span>
                                            <span class="mb-2 text-xs">Subcategoría: <span class="text-dark ms-sm-2 font-weight-bold">{{$project->subcategory->name}}</span></span>
                                            <span class="mb-2 text-xs">Autor: <span class="text-dark ms-sm-2 font-weight-bold">{{$project->user->name}}</span></span>
                                            <span class="mb-2 text-xs">Rol del autor: <span class="text-dark ms-sm-2 font-weight-bold">
                                                    @if ($project->user->role == 'Administrator')
                                                        Administrador
                                                    @elseif ($project->user->role == 'Teacher')
                                                        Profesor
                                                    @else
                                                        Estudiante
                                                    @endif
                                                </span></span>
                                        </div>
                                        <div class="ms-auto text-end">
                                           <a style="width:160px" class="btn btn-primary" href="/showDocument/{{$project->id}}">Ver documento</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
