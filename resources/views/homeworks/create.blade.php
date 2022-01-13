@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Crear tarea
        </div>
        <div class="card-body">
            <form method="POST" action="/homeworks/store" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input class="form-control" type="text" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción: </label>
                    <textarea style="height: 100px;" class="form-control" name="description" id="description" required>
                </textarea>
                </div>
                <div class="form-group">
                    <label for="percent">Porcentaje(%):</label>
                    <input class="form-control" type="number" name="percent" id="percent" min="1"required>
                </div>
                <div class="form-group">
                    <label for="requiredFile">¿Requiere subir un archivo?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="requiredFile" id="requiredFile1" value="yes" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="requiredFile" id="requiredFile2" value="no">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="due_date">Fecha de entrega:  </label>
                    <input class="form-control" type="date" name="due_date" id="due_date" required>
                </div>
                <div class="form-group">
                    <label for="due_time">Hora limite de entrega:  </label>
                    <input class="form-control" type="time" name="due_time" id="due_time" required>
                </div>
                <input type="hidden" name="classroom_id" value="{{$id}}">
                    <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
            </form>
        </div>

    </div>


@endsection
