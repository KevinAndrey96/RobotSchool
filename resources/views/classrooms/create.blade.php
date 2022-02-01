@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Crear curso
        </div>
        <div class="card-body">
            <form method="POST" action="/classrooms/store">
                @csrf
                <div class="form-group">
                    <label for="name"><p style="font-weight:bold">Nombre:</p></label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="name"><p style="font-weight:bold">Código:</p></label>
                    <input class="form-control" type="text" name="code" id="code" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="user_id"><p style="font-weight:bold">Profesor a cargo: </p></label>
                    <select class="form-control" name="user_id" required>
                        @foreach ($teachers as $teacher)
                            @if ($teacher->teacher->school_id == $coordinator->coordinator->school_id)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <input style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" type="submit" value="Crear">
            </form>
        </div>

    </div>
@endsection
