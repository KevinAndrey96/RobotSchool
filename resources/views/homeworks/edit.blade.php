@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Editar tarea
        </div>
        <div class="card-body">
            <form method="POST" action="/homeworks/update" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title"><p style="font-weight:bold">Título:</p></label>
                    <input class="form-control" type="text" name="title" id="title" value="{{$homework->title}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="description"><p style="font-weight:bold">Descripción: </p></label>
                    <textarea style="height: 100px;" class="form-control" name="description" id="description" required>
                        {{ $homework->description }}
                    </textarea>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="percent"><p style="font-weight:bold">Porcentaje(%):</p></label>
                    <input class="form-control" type="number" name="percent" id="percent" value="{{$homework->percent}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="requiredFile"><p style="font-weight:bold">¿Requiere subir un archivo?</p></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="requiredFile" id="requiredFileYes" value="yes"
                                @if ($homework->requiredFile == 'yes') checked @endif>
                        <label class="form-check-label" for="requiredFile1">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="requiredFile" id="requiredFileNo" value="no"
                               @if ($homework->requiredFile == 'no') checked @endif>
                        <label class="form-check-label" for="requiredFile2">
                            No
                        </label>
                    </div>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="due_date"><p style="font-weight:bold">Fecha de entrega:</p></label>
                    <input class="form-control" type="date" name="due_date" id="due_date" value="{{$homework->due_date}}" required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="due_time"><p style="font-weight:bold">Hora limite de entrega:</p></label>
                    <input class="form-control" type="time" name="due_time" id="due_time" value="{{$homework->due_time}}" required>
                </div>
                <input type="hidden" name="homework_id" value="{{$homework->id}}">
                <input type="hidden" name="classroom_id" value="{{$classroom_id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Modificar">
            </form>
        </div>

    </div>
@endsection
