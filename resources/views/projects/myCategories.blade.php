@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Selección de categorías
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <h4><p>Por favor seleccione una categoría:</p></h4>
                <br/>
                <br/>
                <div style="width: 90%; margin:0px auto;">
                    @foreach ($categories as $category)
                        <div style="display:inline-block !important; margin:10px;">
                            <p style="text-align:center; font-size:20px; font-weight:bold; font-style: italic;">{{$category->name}}</p>
                            <a href="/mySubcategories/{{$category->id}}">
                                <img class="img-responsive" style="width:200px; height:150px; border-radius: 20px"  src="https://miel.robotschool.co/{{$category->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>

    </div>

@endsection
