@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Crear coordinador
        </div>
        <div class="card-body">
            <form action="/coordinators/store" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name"><p style="font-weight:bold">Nombre:</p></label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="email"><p style="font-weight:bold">Email:  </p></label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="phone"><p style="font-weight:bold">Teléfono:  </p></label>
                    <input class="form-control" type="text" name="phone" id="phone" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="school_id"><p style="font-weight:bold">Seleccione el colegio:</p></label>
                    <select class="form-control" name="school_id" id="school_id" required>
                        @foreach($freeSchools as $school)
                            <option value="{{$school->id }}">{{$school->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="password"><p style="font-weight:bold">Contraseña:</p></label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
            </form>
        </div>
    </div>
@endsection
