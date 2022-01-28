@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            Crear plan de estudios
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <form method="POST" action="/syllabus/store" id="form-store">
                    @csrf
                    <div class="accordion" id="accordionSyllabuses">
                        @foreach ($categories as $category)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCat{{$category->id}}" aria-expanded="true" aria-controls="collapseCat{{$category->id}}">
                                        {{$category->name}}
                                    </button>
                                </h2>
                                <div id="collapseCat{{$category->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionSyllabuses">
                                    <div style="width:90%;" class="accordion-body">
                                        @foreach ($subcategories as $subcategory)
                                            @if ($subcategory->category_id == $category->id)
                                                <div style="display:block; max-width: 700px; margin-bottom:20px; margin-right: auto; margin-left: auto;">
                                                    <a style="text-decoration: none !important;" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapseSub{{$subcategory->id}}" aria-expanded="true" aria-controls="collapseSub{{$subcategory->id}}" id="accordionSub">
                                                        <p style="text-align:center; font-size:20px; font-weight:bold; font-style: italic; word-wrap: break-word;">{{$subcategory->name}}</p>
                                                        <!--<img class="img-responsive" style="width:200px; height:150px; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$subcategory->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">-->
                                                    </a>
                                                </div>
                                                <div id="collapseSub{{$subcategory->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionSub">
                                                    <div style="width:90%;" class="accordion-body">
                                                        <p style="font-size: 20px; font-weight: bold;">Temas de {{$subcategory->name}}:</p>
                                                        @foreach ($projects as $project)
                                                            @if ($project->subcategory_id == $subcategory->id && $project->theme_type == 'theme')
                                                                <div style="display:inline-block; max-width: 200px; margin:10px;">
                                                                    <p style="text-align:center; font-size:15px; font-weight:bold; font-style: italic; word-wrap: break-word;">{{$project->name}}</p>
                                                                    <img class="img-responsive" style="width:200px; height:150px; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div style="width:90%;" class="accordion-body">
                                                        <p style="font-size: 20px; font-weight: bold;">Proyectos de {{$subcategory->name}}:</p>
                                                        @foreach ($projects as $project)
                                                            @if ($project->subcategory_id == $subcategory->id && $project->theme_type == 'project')
                                                                <div style="display:inline-block; max-width: 200px; margin:10px;">
                                                                    <p style="text-align:center; font-size:15px; font-weight:bold; font-style: italic; word-wrap: break-word;">{{$project->name}}</p>
                                                                    <img class="img-responsive" style="width:200px; height:150px; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    </script>
@endsection
