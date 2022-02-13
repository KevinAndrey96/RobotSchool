@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Importar usuarios
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table id="" class="table dt-responsive display nowrap" width="100%" cellspacing="0">
                                <tbody>
                                    <tr style="text-align: center; padding:10px;">
                                        <td>
                                            <p style="font-weight:bold;">Formato coordinadores</p>
                                            <a href="/exportUsers/coord" target="_blank">
                                                <img style="width:80px; margin-left:auto; margin-right:auto;" src="https://miel.robotschool.co/assets/images/fileTypes/excel.png">
                                            </a>
                                        </td>
                                        <td>
                                            <p style="font-weight:bold;">Formato profesores</p>
                                            <a href="/exportUsers/teach" target="_blank">
                                                <img style="width:80px; margin-left:auto; margin-right:auto;" src="https://miel.robotschool.co/assets/images/fileTypes/excel.png">
                                            </a>
                                        </td>
                                        <td>
                                            <p style="font-weight:bold;">Formato estudiantes</p>
                                            <a href="/exportUsers/stud" target="_blank">
                                                <img style="width:80px; margin-left:auto; margin-right:auto;" src="https://miel.robotschool.co/assets/images/fileTypes/excel.png">
                                            </a>
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
