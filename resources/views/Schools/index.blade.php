@extends('layouts.dashboard')
@section('content')

    @if(Session::has('updaschoolsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updaschoolsuccess') }}
        </div>
    @endif
    @if(Session::has('storeschoolsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storeschoolsuccess') }}
        </div>
    @endif
    @if(Session::has('deleschoolsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleschoolsuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Colegios
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="text-align: center; padding:10px;">Logo</th>
                                        <th style="text-align: center; padding:10px;">Nombre</th>
                                        <th style="text-align: center; padding:10px;">Dirección</th>
                                        <th style="text-align: center; padding:10px;">Ciudad</th>
                                        <th style="text-align: center; padding:10px;">País</th>
                                        <th style="text-align: center; padding:10px;">Estado</th>
                                        <th style="text-align: center; padding:10px;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schools as $school)
                                        <tr style="text-align: center; padding:10px;">
                                            <td>
                                                <a class="magnific" href="https://miel.robotschool.co/{{$school->icon_url}}">
                                                    <img style="width:150px; height:150px;"  class="img-thumbnail" src="https://miel.robotschool.co/{{$school->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                </a>
                                            </td>
                                            <td>{{$school->name}}</td>
                                            <td>{{$school->address}}</td>
                                            <td>{{$school->city}}</td>
                                            <td>{{$school->country}}</td>
                                            <td>
                                                @if($school->is_enable == 1)
                                                    Habilitado
                                                @else
                                                    Deshabilitado
                                                @endif
                                            </td>

                                            <td>
                                                <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                    @if($school->is_enable == 1)
                                                        <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                               id="togglestatus{{$school->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$school->id}})">
                                                    @else
                                                        <input style="width: 50px; height:30px;" data-toggle="toggle"
                                                               id="togglestatus{{$school->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$school->id}})">
                                                    @endif
                                                </div>
                                                <div style="display: inline-block" class="row justify-content-center" class="btn-group" role="group">
                                                    <a href="/schools/edit/{{$school->id}}" style="margin:4px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                        <form method="POST" action="/schools/delete">
                                                                @csrf
                                                                <input type="hidden" name="school_id" value={{ $school->id }}>
                                                                <button style="margin:4px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este colegio?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                        </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>

                            </table>
                            <form id="form-status" name="form-status" method="POST" action="/changeStatusSchool">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="status" id="status">
                            </form>
                        </div>
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
            var school_id = document.getElementById("id");

            if (toggle.checked == true) {
                status.value = 1;
            } else {
                status.value = 0;
            }
            school_id.value = id;
            form.submit();
        }
    </script>
@endsection
