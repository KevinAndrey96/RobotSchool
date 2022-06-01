@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h5 class="text-center">Crear administrador</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form action="/administrators/store" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        {{csrf_field()}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input class="form-control" type="text" name="name" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input class="form-control" type="email" name="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div  class="form-group">
                                                <label for="phone">Teléfono</label>
                                                <input class="form-control" type="number" name="phone" id="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password">Contraseña</label>
                                                <input class="form-control" type="password" name="password" id="password">
                                            </div>
                                        </div>
                                        <div style="margin-top: 15px;" class="col-md-12 text-center">
                                            <input type="submit" style="width:100px; color: white;" class="btn btn-primary rounded-circle" value="Crear">
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

@endsection
