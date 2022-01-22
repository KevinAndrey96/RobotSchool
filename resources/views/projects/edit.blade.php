@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Editar tema
        </div>
        <div class="card-body">
            <form method="POST" action="/project/update" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name"><p style="font-weight:bold">Nombre:</p></label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$project->name}}" required>
                </div>
                @if (Auth::user()->role == 'Administrator')
                    <div style="margin-top:20px" class="form-group">
                        <label for="theme_type"><p style="font-weight:bold">Tipo:</p></label>
                        <select class="form-control" name="theme_type">
                            @if ($project->theme_type == 'theme')
                                <option value="theme" selected>Tema</option>
                            @else
                                <option value="project" selected>Proyecto</option>
                            @endif
                        </select>
                    </div>
                @endif
                <div style="margin-top:20px" class="form-group">
                    <label for="image"><p style="font-weight:bold">Seleccione una imagen:</p></label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="description"><p style="font-weight:bold">Descripción:</p></label>
                    <textarea class="form-control" name="description" id="projectDesc"required>
                        {{$project->description}}
                    </textarea>
                </div>
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Modificar">
            </form>
        </div>
    </div>

@endsection
