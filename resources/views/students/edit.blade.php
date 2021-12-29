@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Editar estudiante
        </div>
        <div class="card-body">
            <form action="/students/update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Nombre:  </label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:  </label>
                    <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono:  </label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{{$user->phone}}" required>
                </div>
                <div class="form-group">
                    <label for="classroom_id">Aula:</label>
                    <select class="form-control" name="classroom_id">
                        @foreach ($classrooms as $classroom)
                            @if ($user->student->classroom_id == $classroom->id)
                                <option value="{{$classroom->id}}" selected>{{$classroom->name}}</option>
                            @else
                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <input type="hidden" name="user_id" value="{{$id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Modificar">
            </form>
        </div>
    </div>
@endsection
