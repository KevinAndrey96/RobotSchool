@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h5 class="text-center">Editar colegio</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                    <form action="/schools/update" method="POST" enctype="multipart/form-data">
                                       <div class="row">
                                        {{csrf_field()}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Nombre del colegio</label>
                                                <input class="form-control" type="text" name="name" id="name" value="{{$school->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address">Dirección</label>
                                                <input class="form-control" type="text" name="address" id="address" value="{{$school->address}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city">Ciudad</label>
                                                <input class="form-control" type="text" name="city" id="city" value="{{$school->city}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country">País</label>
                                                <input class="form-control" type="text" name="country" id="country" value="{{$school->country}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="icon_url">Logo</label>
                                                <input class="form-control" type="file" name="icon_url" id="icon_url">
                                            </div>
                                        </div>
                                        <div style="margin-top: 15px;" class="col-md-12 text-center">
                                            <input type="hidden" name="school_id" value="{{$id}}">
                                            <input type="submit" style="width:100px; color: white;" class="btn btn-primary rounded-circle" value="Modificar">
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
