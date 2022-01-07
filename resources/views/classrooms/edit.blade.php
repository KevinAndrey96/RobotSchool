@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Editar curso
        </div>
        <div class="card-body">
            <form method="POST" action="/classrooms/update">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$classroom->name}}" required>
                </div>
                <div class="form-group">
                    <label for="name">Código:</label>
                    <input class="form-control" type="text" name="code" id="code" value="{{$classroom->code}}" required>
                </div>
                <div class="form-group">
                    <label for="user_id">Profesor a cargo: </label>
                    <select class="form-control" name="user_id" required>
                        @foreach ($teachers as $teacher)
                            @if ($teacher->teacher->school_id == $coordinator->coordinator->school_id)
                                @if ($classroom->user_id == $teacher->id)
                                    <option value="{{$teacher->id}}" selected>{{$teacher->name}}</option>
                                @else
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="classroom_id" value="{{$id}}">
                <input style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" type="submit" value="Modificar">
            </form>
        </div>

    </div>
@endsection
