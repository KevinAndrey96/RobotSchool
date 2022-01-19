@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear proyecto
        </div>
        <div class="card-body">
            <form method="POST" action="/project/store" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name"><p style="font-weight:bold">Nombre:</p></label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="image"><p style="font-weight:bold">Seleccione una imagen:</p></label>
                    <input class="form-control" type="file" name="image" id="image" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="description"><p style="font-weight:bold">Descripción:</p></label>
                    <textarea class="form-control" name="description" id="projectDesc"required>
                    </textarea>
                </div>
                <input type="hidden" name="subcategory_id" value="{{$id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
            </form>

        </div>
    </div>
@endsection
