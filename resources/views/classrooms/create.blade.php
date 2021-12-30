@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Crear aula
        </div>
        <div class="card-body">
            <form method="POST" action="/classrooms/store">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Código:</label>
                    <input class="form-control" type="text" name="code" id="code" required>
                </div>
                <div class="form-group">
                    <label for="user_id">Profesor a cargo: </label>
                    <select class="form-control" name="user_id" required>
                        @foreach ($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach

                    </select>
                </div>
                <input style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" type="submit" value="Crear">
            </form>
        </div>

    </div>
@endsection