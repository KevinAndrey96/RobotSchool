@extends('layouts.dashboard')
@section('content')
    @if(Session::has('storesubcasuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storesubcasuccess') }}
        </div>
    @endif
    @if(Session::has('updasubcasuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updasubcasuccess') }}
        </div>
    @endif
    @if(Session::has('delesubcasuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('delesubcasuccess') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Subcategorías de {{$category->name}}
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <a style="margin-bottom:30px" class="btn btn-primary" href="/subcategories/create/{{$id}}">Crear subcategoría</a>
                        <div class="table-responsive">
                            <table id="datatable" style="overflow-x:auto;" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; padding:10px;">Imagen</th>
                                    <th style="text-align: center; padding:10px;">Nombre</th>
                                    <th style="text-align: center; padding:10px;">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td style="text-align: center; padding:10px;">
                                            <a class="magnific" href="https://miel.robotschool.co/{{$subcategory->icon_url}}">
                                                <img style="width:200px" class="img-thumbnail" src="https://miel.robotschool.co/{{$subcategory->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                            </a>
                                        </td>
                                        <td style="text-align: center; padding:10px;">{{$subcategory->name}}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group" role="group">
                                                <div style="display: inline-block">
                                                    <a href="/subcategories/description/{{$subcategory->id}}" style="margin:3px; width:40px;" title="Descripción" class="btn btn-block btn-primary form-control"><i class="fas fa-plus"></i></a>
                                                </div>
                                                <div style="display: inline-block !important">
                                                    <a href="/subcategories/edit/{{$subcategory->id}}" style="margin:4px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                                </div>
                                                <form method="POST" action="/subcategories/delete">
                                                    @csrf
                                                    <input type="hidden" name="subcategory_id" value={{ $subcategory->id }}>
                                                    <div style="display: inline-block !important;">
                                                        <button style="margin:4px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar esta subcategoría?');"><i class="fas fa-exclamation-triangle"></i></button>
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
