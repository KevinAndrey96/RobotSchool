@extends('layouts.dashboard')
@section('content')
    @if(Session::has('updateachsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updateachsuccess') }}
        </div>
    @endif
    @if(Session::has('deleteteachersuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleteteachersuccess') }}
        </div>
    @endif
    @if(Session::has('storeteachersuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storeteachersuccess') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Profesores
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
                                    <th style="text-align: center; padding:10px;">Colegio</th>
                                    <th style="text-align: center; padding:10px;">Email</th>
                                    <th style="text-align: center; padding:10px;">Teléfono</th>
                                    <th style="text-align: center; padding:10px;">Estado</th>
                                    <th style="text-align: center; padding:10px;">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    @if($teacher->teacher->school_id == $coordinator->coordinator->school_id)
                                    <tr style="text-align: center; padding:10px;">
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->teacher->school->name}}</td>
                                        <td>{{$teacher->email}}</td>
                                        <td>{{$teacher->phone}}</td>
                                        <td>
                                            @if($teacher->is_enable == 1)
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>

                                        <td>
                                            <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                @if($teacher->is_enable == 1)
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$teacher->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$teacher->id}})">
                                                @else
                                                    <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                           id="togglestatus{{$teacher->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$teacher->id}})">
                                                @endif
                                            </div>
                                            <div style="display: inline-block" class="row justify-content-center" class="btn-group" role="group">
                                                <a href="/teachers/edit/{{$teacher->id}}" style="margin:4px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                <form method="POST" action="/teachers/delete">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value={{ $teacher->id }}>
                                                    <button style="margin:4px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este profesor?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif  
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
                var teacher_id = document.getElementById("id");

                if (toggle.checked == true) {
                    status.value = 1;
                } else {
                    status.value = 0;
                }
                teacher_id.value = id;
                form.submit();
            }
        </script>
    </div>
@endsection
