@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Selección de subcategorías
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <h4><p>Por favor seleccione una subcategoría:</p></h4>
                <br/>
                <br/>
                <div style="width: 90%; margin:0px auto;">
                    @foreach ($subcategories as $subcategory)
                        <div style="display:inline-block !important; margin:10px;">
                            <p style="text-align:center; font-size:20px; font-weight:bold; font-style: italic;">{{$subcategory->name}}</p>
                            <a href="/project/create/{{$subcategory->id}}">
                                <img class="img-responsive" style="width:200px; height:150px; border-radius: 20px"  src="https://miel.robotschool.co/{{$subcategory->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
