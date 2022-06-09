@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h6 class="text-center">Nuevo Curso</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form method="POST" action="/classrooms/store">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input class="form-control" type="text" name="name" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Código</label>
                                                <input class="form-control" type="text" name="code" id="code" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="user_id">Profesor a cargo</label>
                                                <select class="form-control" name="user_id" required>
                                                    @foreach ($teachers as $teacher)
                                                        @if ($teacher->teacher->school_id == $coordinator->coordinator->school_id)
                                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px;" class="col-md-3 ps-6">
                                            <input style="width:100px; color: white;" class="btn btn-primary rounded-circle" type="submit" value="Crear">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
