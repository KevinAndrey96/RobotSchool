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
                        @if (is_null($syllabus))
                        <a style="margin-bottom:30px; width:160px;" class="btn btn-primary" href="/syllabus/create?classroom_id={{$classroom_id}}">Crear syllabus</a>
                        @endif
                            <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center; padding:10px;">
                                        <th>Syllabus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr style="text-align: center; padding:10px;">
                                    <td>
                                        @if (! is_null($syllabus))
                                            <a href="/syllabus/show/{{$classroom_id}}">
                                                <img style="width:50px" src="https://miel.robotschool.co/assets/images/fileTypes/pdf.png">
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (! is_null($syllabus))
                                            <div style="display: inline-block">
                                                <form method="POST" action="/syllabus/delete">
                                                    @csrf
                                                    <input type="hidden" name="classroom_id" value={{$classroom_id }}>
                                                    <button style="margin:3px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este plan de estudios?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
