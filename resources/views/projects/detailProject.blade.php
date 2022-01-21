@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Detalle del tema
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div style="display:block; width: 80%; margin: 0px auto;">
                            <label style="font-size:20px; font-weight:bold">Nombre:</label>
                            <p style="font-size:20px;">{{$project->name}}</p>
                            <br/>
                            <label style="font-size:20px; font-weight:bold">Tipo:</label>
                            <p style="font-size:20px;">
                                @if ($project->theme_type == 'theme')
                                    Tema
                                @else
                                    Proyecto
                                @endif
                            </p>
                            <br/>
                            <label style="font-size:20px; font-weight:bold">Categoría:</label>
                            <p style="font-size:20px;">{{$project->subcategory->category->name}}</p>
                            <br/>
                            <label style="font-size:20px; font-weight:bold">Subcategoría:</label>
                            <p style="font-size:20px;">{{$project->subcategory->name}}</p>
                            <br/>
                            <label style="font-size:20px; font-weight:bold">Autor:</label>
                            <p style="font-size:20px;">{{$project->user->name}}</p>
                            <br/>
                            <label style="font-size:20px; font-weight:bold">Rol del autor:</label>
                            <p style="font-size:20px;">
                                @if ($project->user->role == 'Administrator')
                                    Administrador
                                @elseif ($project->user->role == 'Teacher')
                                    Profesor
                                @else
                                    Estudiante
                                @endif
                            </p>
                            <br/>
                            <a style="width:160px" class="btn btn-primary" href="/showDocument/{{$project->id}}">Ver documento</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
