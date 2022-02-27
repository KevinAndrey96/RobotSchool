@extends('layouts.dashboard')
@section('content')
    @if(Session::has('messageSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('messageSuccess') }}
        </div>
    @endif
    @if(Session::has('failChange'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failChange') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Cambiar contraseña
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <form method="POST" action="/updatePassword">
                            @csrf
                            <div class="form-group">
                                <label for="oldPass"><p style="font-weight:bold">Digite su antigua contraseña:</p></label>
                                <input class="form-control" name="oldPass" type="password" required>
                            </div>
                            <div class="form-group" style="margin-top:20px">
                                <label for="newPass1"><p style="font-weight:bold">Digite su nueva contraseña:</p></label>
                                <input class="form-control" name="newPass1" type="password" required>
                            </div>
                            <div class="form-group" style="margin-top:20px">
                                <label for="newPass2"><p style="font-weight:bold">Digite otra vez su nueva contraseña:</p></label>
                                <input class="form-control" name="newPass2" type="password" required>
                            </div>
                            <input type="submit" style="width:160px; color: white; margin-top:20px !important; float:right;" class="btn btn-primary" value="Modificar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
