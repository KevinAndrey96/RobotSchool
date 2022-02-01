@extends('layouts.dashboard')
@section('content')
    @if(Session::has('upMyHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('upMyHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('extensionError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('extensionError') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Detalle de tarea
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div style="display:block; width: 80%; margin: 0px auto;">
                            <h2><p  class="text-center">{{$homework->title}}</p></h2>
                            <h4><p style="margin-top:50px">Descripción:</p></h4>
                            <p style="text-align:justify">{{$homework->description}}</p>
                            @if ($homework->requiredFile == 'yes')
                                <form method="POST" action="/uploadMyHomework" enctype="multipart/form-data">
                                    @csrf
                                    <h4><p style="text-align:justify">Añadir entrega:</p></h4>
                                    <p style="text-align:justify">Por favor seleccione un archivo (las extensiones permitidas son .pdf, .docx y .rar):</p>
                                    <input class="form-control" type="file" name="homeworkFile" required>
                                    <input type="hidden" name="uploadedHomework_id" value="{{$uploadedHomework->id}}">
                                    <input style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" type="submit" value="Subir entrega">
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
