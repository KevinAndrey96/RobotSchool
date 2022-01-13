@extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('UpdaHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UpdaHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('DeleHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('PercentHomeworkError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('PercentHomeworkError') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Tareas para {{$classroom->name}}
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <a style="margin-bottom:30px; width:160px;" class="btn btn-primary" href="/homeworks/create/{{$id}}">Crear tarea</a>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center; padding:10px;">
                                        <th>Título</th>
                                        <th>Porcentaje</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($homeworks as $homework)
                                    <tr style="text-align: center; padding:10px;">
                                        <td>{{$homework->title}}</td>
                                        <td>{{$homework->percent}}%</td>
                                        <td>{{$homework->due_date}}</td>
                                        <td>{{$homework->due_time}}</td>
                                        <td>
                                            <div class="justify-content-center" class="btn-group" role="group">
                                                <div style="display: inline-block">
                                                    <a href="/homeworks/edit/{{$homework->id}}/{{$classroom->id}}" style="margin:3px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                </div>
                                                <div style="display: inline-block">
                                                    <form method="POST" action="/homeworks/delete">
                                                        @csrf
                                                        <input type="hidden" name="homework_id" value={{ $homework->id }}>
                                                        <button style="margin:3px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar esta tarea?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                    </form>
                                                </div>
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
