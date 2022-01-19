@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Selección de categorías
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <h4><p>Por favor seleccione una categoría:</p></h4>
                <div style="width: 80%; margin:0px auto; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div class="table-responsive">
                            <table style="overflow-x:auto;" class="table table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td style="text-align: center; padding:10px;">
                                            <p style="font-size:30px; font-weight:bold; font-style: italic;">{{$category->name}}</p>
                                            <a href="/mySubcategories/{{$category->id}}">
                                                <img style="width:50%; border-radius: 20px"  src="https://miel.robotschool.co/{{$category->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                            </a>
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
