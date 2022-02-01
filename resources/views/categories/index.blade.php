@extends('layouts.dashboard')
@section('content')
    @if(Session::has('stocategosuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('stocategosuccess') }}
        </div>
    @endif
    @if(Session::has('updacategosuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updacategosuccess') }}
        </div>
    @endif
    @if(Session::has('delecategosuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('delecategosuccess') }}
        </div>
    @endif

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
                                <th style="text-align: center; padding:10px;">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td style="text-align: center; padding:10px;">
                                        <a class="magnific" href="https://miel.robotschool.co/{{$category->icon_url}}">
                                            <img style="width:200px" class="img-thumbnail" src="https://miel.robotschool.co/{{$category->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                        </a>
                                    </td>
                                    <td style="text-align: center; padding:10px;">{{$category->name}}</td>
                                    <td style="text-align: center;">
                                        <div style="display: inline-block" class="btn-group" role="group">
                                            <div style="display: inline-block">
                                                <a href="/categories/description/{{$category->id}}" style="margin:3px; width:40px;" title="Descripción" class="btn btn-block btn-primary form-control"><i class="fas fa-plus"></i></a>
                                            </div>
                                            <div style="display: inline-block">
                                                <a href="/subcategories/{{$category->id}}" style="margin:3px; width:40px;" alt="Subcategorías" class="btn btn-block btn-success form-control"><i style="width:30px" class="fab fa-stripe-s"></i></a>
                                            </div>
                                            <div style="display: inline-block">
                                                <a href="/categories/edit/{{$category->id}}" style="margin:3px; width:40px;" alt="Editar" class="btn btn-block btn-warning form-control"><i style="color:white" class="far fa-edit"></i></a>
                                            </div>
                                            <div style="display: inline-block">
                                                <form method="POST" action="/categories/delete">
                                                    @csrf
                                                    <input type="hidden" name="category_id" value={{ $category->id }}>
                                                    <button style="margin:3px; width:40px !important;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar esta categoría?');"><i class="fas fa-exclamation-triangle"></i></button>
                                                </form>
                                            </div>
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
