@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Historial académico de {{$user->name}}
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead>
                                <tr style="text-align: center; padding:10px;">
                                    <th>Nombre del curso</th>
                                    <th>Definitiva</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($academicHistories as $academicHistory)
                                    <tr style="text-align: center; padding:10px;">
                                        <td>{{$academicHistory->classroom->name}}</td>
                                        <td>{{$academicHistory->totalScore}}</td>
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
