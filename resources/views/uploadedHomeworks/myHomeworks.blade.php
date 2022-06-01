@extends('layouts.dashboard')
@section('content')
    @if(Session::has('upMyHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('upMyHomeworkSuccess') }}
        </div>
    @endif

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
                                        <th>Entregable</th>
                                        <th>Estado</th>
                                        <th>Fecha de envío</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($myHomeworks as $myHomework)
                                        <tr style="text-align: center; padding:10px;">
                                            <td>{{$myHomework->homework->title}}</td>
                                            <td>
                                                @if (! is_null($myHomework->path))
                                                    <a href="https://miel.robotschool.co/{{$myHomework->path}}" target="_blank">
                                                        @if (strpos($myHomework->path, '.pdf'))
                                                            <img style="width:50px" src="https://miel.robotschool.co/storage/fileTypes/pdf.png">
                                                        @elseif (strpos($myHomework->path, '.docx'))
                                                            <img style="width:50px" src="https://miel.robotschool.co/storage/fileTypes/docx.png">
                                                        @elseif (strpos($myHomework->path, '.zip'))
                                                            <img style="width:50px" src="https://miel.robotschool.co/storage/fileTypes/compressed.png">
                                                        @endif
                                                    </a>
                                                @endif
                                                    @if ($myHomework->homework->requiredFile == 'no')
                                                        No requiere
                                                    @endif
                                            </td>
                                            <td>
                                                @if ($myHomework->status == 'notUploaded')
                                                    No subida
                                                @endif
                                                    @if ($myHomework->status == 'send')
                                                        Enviada
                                                    @endif
                                                    @if ($myHomework->status == 'graded')
                                                        Calificada
                                                    @endif
                                            </td>
                                            <td>
                                                @if (isset($myHomework->delivery_at))
                                                    {{$myHomework->delivery_at}}
                                                @endif
                                            </td>
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
