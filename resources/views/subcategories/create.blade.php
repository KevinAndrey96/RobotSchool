@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear subcategoría
        </div>
        <div class="card-body">
            <form method="POST" action="/subcategories/store" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea style="height: 100px;" class="form-control" name="description" id="description" required>
                </textarea>
                </div>
                <div class="form-group">
                    <label for="icon_url">Icono:  </label>
                    <input class="form-control" type="file" name="icon_url" id="icon_url" required>
                </div>
                <input type="hidden" name="category_id" value="{{$id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
            </form>
        </div>
    </div>

@endsection
