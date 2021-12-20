@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        Categorías
    </div>
    <div class="card-body container-fluid">
        <div class="justify-content-center">
            <div style="width: 100%; padding-left: -10px;">
                <div class="col-auto mt-5">
                    <div class="table-responsive">
                        <table id="datatable" style="overflow-x:auto;" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                            <thead class="thead-light">
                            <tr>
                                <th style="text-align: center; padding:10px;">Imagen</th>
                                <th style="text-align: center; padding:10px;">Nombre</th>
                                <th style="text-align: center; padding:10px; width:500px;">Descripción</th>
                                <th style="text-align: center; padding:10px;">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td style="text-align: center; padding:10px;">
                                        <a class="magnific" href="https://miel.robotschool.co/storage/category_images/{{$category->id.'.png'}}">
                                            <img style="width:200px" class="img-thumbnail" src="https://miel.robotschool.co/storage/category_images/{{$category->id.'.png'}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                        </a>
                                    </td>
                                    <td style="text-align: center; padding:10px;">{{$category->name}}</td>
                                    <td style="max-width: 500px; word-wrap: break-word; white-space: normal !important; text-align: justify;">
                                        {{$category->description}}
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="display: inline-block" class="row" class="btn-group" role="group">
                                            <div style="display: inline-block !important">
                                                <a href="/categories/edit/{{$category->id}}" style="margin:4px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                            </div>
                                            <form method="POST" action="/categories/delete">
                                                @csrf
                                                <input type="hidden" name="school_id" value={{ $category->id }}>
                                                    <div style="display: inline-block !important;">
                                                        <button style="margin:4px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este colegio?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                    </div>
                                            </form>
                                        </div>
                                    </td>
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
