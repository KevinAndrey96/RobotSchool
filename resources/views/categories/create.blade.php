@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h6 class="text-center">Nueva categoría</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                            <form method="POST" action="/categories/store" enctype="multipart/form-data">
                                @csrf
                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" type="text" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="icon_url">Ícono</label>
                                        <input class="form-control" type="file" name="icon_url" id="icon_url" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <textarea style="height: 38px;" class="form-control" name="description"
                                                  id="description" required>
                                        </textarea>
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

    <div class="card-body">
        <form method="POST" action="/categories/store" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"><p style="font-weight:bold">Nombre:</p></label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div style="margin-top:20px" class="form-group"><label for="description"><p style="font-weight:bold">Descripción:</p></label><textarea style="height: 100px;" class="form-control" name="description" id="description" required></textarea></div>
            <div style="margin-top:20px" class="form-group">
                <label for="icon_url"><p style="font-weight:bold">Ícono: </p></label>
                <input class="form-control" type="file" name="icon_url" id="icon_url" required>
            </div>
            <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
        </form>
    </div>
</div>
@endsection
