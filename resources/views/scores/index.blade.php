@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Mis calificaciones
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead>
                                <tr style="text-align: center; padding:10px;">
                                    <th>Título</th>
                                    <th>Porcentaje</th>
                                    <th>Calificación</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($upHomeworks as $upHomework)
                                    <tr style="text-align: center; padding:10px;">
                                        <td>{{$upHomework->homework->title}}</td>
                                        <td>{{$upHomework->homework->percent}}%</td>
                                        <td>{{$upHomework->score}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p style="text-align:center; font-size:20px; font-weight:bold; font-style: italic;">Nota acumulada: {{$acum}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
