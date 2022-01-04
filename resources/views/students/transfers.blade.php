@extends('layouts.dashboard')
@section('content')
    @if(Session::has('transfersError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('transfersError') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Transferencias de estudiantes
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <form method="POST" action="/studentsClassroomUpdate">
                            @csrf
                        <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th style="text-align: center; padding:10px;">Selección</th>
                                        <th style="text-align: center; padding:10px;">Nombre</th>
                                        <th style="text-align: center; padding:10px;">Aula</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($students as $student)
                                            <tr style="text-align: center; padding:10px;">
                                                <td>
                                                    <input class="form-check-input" type="checkbox" name="studentCheck[]" id="studentCheck{{$student->id}}" value="{{$student->id}}" onclick="getIDS({{$student->id}})">
                                                </td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->student->classroom->name}}</td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            <input type="hidden" name="cart" id="cart">

                        </div>
                            <div style="margin-top:30px" class="form-group">
                                <label for="classroom_id"><strong>Seleccione un curso:</strong></label>
                                <select class="form-control" name="classroom_id">
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Transferir">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ids = new Array();

        function getIDS(studentID)
        {
            var box = document.getElementById("studentCheck" + studentID);
            var cart = document.getElementById("cart");
            if (box.checked == true) {
                ids.push(studentID)
            } else {
                var i = ids.indexOf(studentID);
                if ( i !== -1 ) {
                    ids.splice( i, 1 );
                }
            }
            cart.value = ids;
        }
    </script>
@endsection
