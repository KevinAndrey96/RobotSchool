@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Editar colegio
        </div>
        <div class="card-body">
            <form action="/schools/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name"><p style="font-weight:bold">Nombre del colegio:  </p></label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$school->name}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="address"><p style="font-weight:bold">Dirección:  </p></label>
                    <input class="form-control" type="text" name="address" id="address" value="{{$school->address}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="city"><p style="font-weight:bold">Ciudad: </p></label>
                    <input class="form-control" type="text" name="city" id="city" value="{{$school->city}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="country"><p style="font-weight:bold">País:  </p></label>
                    <input class="form-control" type="text" name="country" id="country" value="{{$school->country}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="icon_url"><p style="font-weight:bold">Logo:  </p></label>
                    <input class="form-control" type="file" name="icon_url" id="icon_url">
                </div>
                <input type="hidden" name="school_id" value="{{$id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Modificar">
            </form>
        </div>
    </div>
@endsection
