@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h6 class="text-center">Nueva tarea</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form method="POST" action="/homeworks/store" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Título:</label>
                                                <input class="form-control" type="text" name="title" id="title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="percent">Porcentaje(%):</label>
                                                <input class="form-control" type="number" name="percent" id="percent" min="1"required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="requiredFile">¿Requiere subir un archivo?</label>
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
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Descripción:</label>
                                                <textarea style="height: 100px;" class="form-control" name="description" id="description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="display: none;">
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
                                        </div>
                                        <div class="col-md-12 text-center" style=" margin-top: 15px;">
                                            <input type="hidden" name="classroom_id" value="{{$id}}">
                                            <input type="submit" style="width:120px; margin-top:5px;" class="btn btn-primary rounded-circle" value="Crear">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
