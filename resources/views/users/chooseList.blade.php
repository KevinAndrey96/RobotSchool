@extends('layouts.dashboard')
@section('content')
    @if(Session::has('UsersImportSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UsersImportSuccess') }}
        </div>
    @endif
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
                                            <a href="/exportUsers/coord">
                                                <img style="width:80px; margin-left:auto; margin-right:auto;" src="https://miel.robotschool.co/assets/images/fileTypes/excel.png">
                                            </a>
                                        </td>
                                        <td>
                                            <p style="font-weight:bold;">Formato profesores</p>
                                            <a href="/exportUsers/teach">
                                                <img style="width:80px; margin-left:auto; margin-right:auto;" src="https://miel.robotschool.co/assets/images/fileTypes/excel.png">
                                            </a>
                                        </td>
                                        <td>
                                            <p style="font-weight:bold;">Formato estudiantes</p>
                                            <a href="/exportUsers/stud">
                                                <img style="width:80px; margin-left:auto; margin-right:auto;" src="https://miel.robotschool.co/assets/images/fileTypes/excel.png">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form method="POST" action="/importUsers" enctype="multipart/form-data">
                                @csrf
                                <div style="margin-top: 40px;" class="form-group">
                                    <label for="list"><p style="font-weight:bold;">Elija una lista:</p></label>
                                    <input class="form-control" type="file" name="userList">
                                    <input style="width:160px; margin-top: 40px; float:right;" class="btn btn-primary" type="submit" value="Importar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
