@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Editar coordinador
        </div>
        <div class="card-body">
            <form action="/coordinators/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name"><p style="font-weight:bold">Nombre:  </p></label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="email"><p style="font-weight:bold">Email:  </p></label>
                    <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}"required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="phone"><p style="font-weight:bold">Teléfono:  </p></label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{{$user->phone}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="phone"><p style="font-weight:bold">Seleccione el colegio:</p></label>
                    <select class="form-control" name="school_id" id="school_id" required>
                        @foreach($schools as $school)
                            @if($user->coordinator->school_id == $school->id)
                                <option value="{{$school->id}}" selected>{{$school->name}}</option>
                            @else
                                <option value="{{$school->id}}">{{$school->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="password"><p style="font-weight:bold">Contraseña:</p></label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <input type="hidden" name="user_id" value="{{$id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Modificar">
            </form>
        </div>
    </div>
@endsection
