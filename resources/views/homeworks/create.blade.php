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
                    <label for="title"><p style="font-weight:bold">Título:</p></label>
                    <input class="form-control" type="text" name="title" id="title" required>
                </div>
                <div style="margin-top:20px" class="form-group"><label for="description"><p style="font-weight:bold">Descripción: </p></label><textarea style="height: 100px;" class="form-control" name="description" id="description" required></textarea>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="percent"><p style="font-weight:bold">Porcentaje(%):</p></label>
                    <input class="form-control" type="number" name="percent" id="percent" min="1"required>
                </div>
                <div style="margin-top:20px" class="form-group">
                    <label for="requiredFile"><p style="font-weight:bold">¿Requiere subir un archivo?</p></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="requiredFile" id="requiredFile1" value="yes" onChange="showDatetime()" >
                        <label class="form-check-label" for="flexRadioDefault1">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="requiredFile" id="requiredFile2" onChange="showDatetime()" value="no" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <div id="datetime" style="display: none">
                    <div style="margin-top:20px" class="form-group">
                        <label for="due_date"><p style="font-weight:bold">Fecha de entrega:  </p></label>
                        <input class="form-control" type="date" name="due_date" id="due_date" disabled required>
                    </div>
                    <div style="margin-top:20px" class="form-group">
                        <label for="due_time"><p style="font-weight:bold">Hora limite de entrega: </p></label>
                        <input class="form-control" type="time" name="due_time" id="due_time" disabled required>
                    </div>
                </div>
                <input type="hidden" name="classroom_id" value="{{$id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
            </form>
        </div>
    </div>
    <script>
        function showDatetime()
        {
            var radioYES = document.getElementById('requiredFile1');
            var radioNO = document.getElementById('requiredFile2');
            var divDatetime = document.getElementById('datetime');
            var dueDate = document.getElementById('due_date');
            var dueTime = document.getElementById('due_time');
            if (radioYES.checked) {
                divDatetime.style.display = "block";
                dueDate.disabled = false;
                dueTime.disabled = false;
            }
            if (radioNO.checked) {
                divDatetime.style.display = "none";
                dueDate.disabled = true;
                dueTime.disabled = true;
            }
        }
    </script>
@endsection
