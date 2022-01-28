@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Mi plan de estudios
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <a style="margin-bottom:30px; width:160px;" class="btn btn-primary" href="/syllabus/create?classroom_id={{$classroom_id}}">Crear syllabus</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
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

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
