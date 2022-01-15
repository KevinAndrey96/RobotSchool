@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Mis tareas
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                    <tr style="text-align: center; padding:10px;">
                                        <th>Título</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($myHomeworks as $myHomework)
                                        <tr style="text-align: center; padding:10px;">
                                            <td>{{$myHomework->homework->title}}</td>
                                            <td>
                                                <a href="detailMyHomework/{{$myHomework->id}}" class="btn btn-primary" title="Detalle" style="margin:4px; width:40px;"><i class="fas fa-plus"></i></a>
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
