@extends('layouts.dashboard')
@section('content')
    @if(Session::has('UpdaStudentSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UpdaStudentSuccess') }}
        </div>
    @endif
    @if(Session::has('DeleteStudentSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleteStudentSuccess') }}
        </div>
    @endif
    @if(Session::has('StoreStudentSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreStudentSuccess') }}
        </div>
    @endif
    @if(Session::has('transfersSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('transfersSuccess') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            @hasrole('Coordinator')
            Estudiantes
            @endhasrole
            @hasrole('Teacher')
            Estudiantes de {{$classroom->name}}
            @endhasrole
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
                                    <!--
                                    <th style="text-align: center; padding:10px;">Colegio</th>
                                    -->
                                    @hasrole('Coordinator')
                                    <th style="text-align: center; padding:10px;">Aula</th>
                                    @endhasrole
                                    <th style="text-align: center; padding:10px;">Email</th>
                                    <th style="text-align: center; padding:10px;">Teléfono</th>
                                    @hasrole('Coordinator')
                                    <th style="text-align: center; padding:10px;">Estado</th>
                                    @endhasrole
                                    <th style="text-align: center; padding:10px;">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                    <tr style="text-align: center; padding:10px;">
                                        <td>{{$student->name}}</td>
                                        <!--
                                        <td>{{$student->student->school->name}}</td>
                                        -->
                                        @hasrole('Coordinator')
                                        <td>{{$student->student->classroom->name}}</td>
                                        @endhasrole
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        @hasrole('Coordinator')
                                        <td>
                                            @if($student->is_enable == 1)
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>
                                        @endhasrole

                                        <td>
                                            @hasrole('Coordinator')
                                            <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                @if($student->is_enable == 1)
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$student->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$student->id}})">
                                                @else
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$student->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$student->id}})">
                                                @endif
                                            </div>
                                            <div style="display: inline-block" class="row justify-content-center" class="btn-group" role="group">
                                                <a href="/students/edit/{{$student->id}}" style="margin:4px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                <form method="POST" action="/students/delete">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value={{ $student->id }}>
                                                    <button style="margin:4px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este estudiante?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                </form>
                                            </div>
                                            @endhasrole
                                            @hasrole('Teacher')
                                            <div style="display: inline-block" class="row justify-content-center" class="btn-group" role="group">
                                                <a href="/uploadedHomeworks/{{$student->id}}" style="margin:4px; width:40px;" title="Tareas" class="btn btn-block btn-success form-control"><i class="fas fa-tasks"></i></a>
                                            </div>
                                            @endhasrole
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                            <form id="form-status" name="form-status" method="POST" action="/changeStatusTeacher">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="status" id="status">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script>
            function getStatus(id)
            {
                var toggle = document.getElementById("togglestatus"+id);
                var status = document.getElementById("status");
                var form = document.getElementById("form-status");
                var student_id = document.getElementById("id");

                if (toggle.checked == true) {
                    status.value = 1;
                } else {
                    status.value = 0;
                }
                student_id.value = id;
                form.submit();
            }
        </script>
    </div>
@endsection
