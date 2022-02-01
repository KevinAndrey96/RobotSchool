@extends('layouts.dashboard')
@section('content')
    @if(Session::has('updaclasssuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updaclasssuccess') }}
        </div>
    @endif
    @if(Session::has('deleclasssuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleclasssuccess') }}
        </div>
    @endif
    @if(Session::has('storeclasssuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storeclasssuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Cursos
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; padding:10px;">Nombre</th>
                                    <th style="text-align: center; padding:10px;">Código</th>
                                    @hasrole('Coordinator')
                                    <th style="text-align: center; padding:10px;">Profesor</th>
                                    @endhasrole
                                    <th style="text-align: center; padding:10px;">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($classrooms as $classroom)
                                        <tr style="text-align: center; padding:10px;">
                                            <td>{{$classroom->name}}</td>
                                            <td>{{$classroom->code}}</td>
                                            @hasrole('Coordinator')
                                            <td>{{$classroom->user->name}}</td>
                                            @endhasrole
                                            <td>
                                                <div class="justify-content-center" class="btn-group" role="group">
                                                    <!--
                                                    <div style="display: inline-block" >
                                                        <a href="/coordinators/edit/{{$classroom->id}}" style="margin:3px; width:40px;" title="Intercambiar estudiantes" class="btn btn-block btn-primary form-control"><i class="fas fa-exchange-alt"></i></a>
                                                    </div>
                                                    -->
                                                        <div style="display: inline-block" >
                                                            <a href="/students/{{$classroom->id}}" style="margin:3px; width:40px;" title="Estudiantes" class="btn btn-block btn-primary form-control"><i class="fas fa-users"></i></a>
                                                        </div>
                                                        @hasrole('Teacher')
                                                        <div style="display: inline-block" >
                                                            <a href="/syllabus?classroom_id={{$classroom->id}}" style="margin:3px; width:40px; color:white;" title="Syllabus" class="btn btn-block btn-dark form-control"><i class="fas fa-atlas"></i></a>
                                                        </div>
                                                        <div style="display: inline-block" >
                                                            <a href="/homeworks/{{$classroom->id}}" style="margin:3px; width:40px;" title="Tareas" class="btn btn-block btn-success form-control"><i class="fas fa-thumbtack"></i></a>
                                                        </div>
                                                        @endhasrole
                                                        @hasrole('Coordinator')
                                                        <div style="display: inline-block" >
                                                            <a href="/classrooms/edit/{{$classroom->id}}" style="margin:3px; width:40px;" title="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                        </div>

                                                    <div style="display: inline-block">
                                                        <form method="POST" action="/classrooms/delete">
                                                            @csrf
                                                            <input type="hidden" name="classroom_id" value={{$classroom->id }}>
                                                            <button style="margin:3px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este curso?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                        </form>
                                                    </div>
                                                    @endhasrole
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
