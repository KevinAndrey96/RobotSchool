@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear colegio
        </div>
        <div class="card-body">
            <form action="/schools/store" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Nombre del colegio:  </label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Dirección:  </label>
                    <input class="form-control" type="text" name="address" id="address" required>
                </div>
                <div class="form-group">
                    <label for="city">Ciudad:  </label>
                    <input class="form-control" type="text" name="city" id="city" required>
                </div>
                <div class="form-group">
                    <label for="country">País:  </label>
                    <input class="form-control" type="text" name="country" id="country" required>
                </div>
                <div class="form-group">
                    <label for="icon_url">Logo:  </label>
                    <input class="form-control" type="file" name="icon_url" id="icon_url">
                </div>
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
            </form>
        </div>
    </div>
@endsection
