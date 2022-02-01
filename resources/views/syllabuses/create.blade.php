@extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreSyllabusError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('StoreSyllabusError') }}
        </div>
    @endif
    @if(Session::has('SyllabusExists'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('SyllabusExists') }}
        </div>
    @endif
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
                                    <div style="width:90%; margin-left:auto; margin-right: auto;" class="accordion-body">
                                        @foreach ($subcategories as $subcategory)
                                            @if ($subcategory->category_id == $category->id)
                                                <div style="display:block; max-width: 800px; margin-bottom:20px; margin-right: auto; margin-left: auto;">
                                                    <a style="text-decoration: none !important;" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapseSub{{$subcategory->id}}" aria-expanded="true" aria-controls="collapseSub{{$subcategory->id}}" id="accordionSub">
                                                        <p style="text-align:center; font-size:25px; font-weight:bold; font-style: italic; word-wrap: break-word;">{{$subcategory->name}}</p>
                                                        <!--<img class="img-responsive" style="width:200px; height:150px; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$subcategory->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">-->
                                                    </a>
                                                </div>
                                                <div id="collapseSub{{$subcategory->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionSub">
                                                    <div style="" class="accordion-body">
                                                        <p style="font-size: 22px; font-weight: bold; color:red; text-align:center;">Temas:</p>
                                                        @foreach ($projects as $project)
                                                            @if ($project->subcategory_id == $subcategory->id && $project->theme_type == 'theme' && $project->is_enable == 1)
                                                                <div style="display:inline-block; max-width: 200px; margin:10px;">
                                                                    <p style="text-align:center; font-size:15px; font-weight:bold; font-style: italic; word-wrap: break-word; color:darkgreen;">{{$project->name}}</p>
                                                                    <center>
                                                                        <img class="img-responsive" style="width:150px; height:100px; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                                        <input style="display: block; width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="projectCheck[]" id="projectCheck{{$project->id}}" value="{{$project->id}}" onclick="getIDS({{$project->id}})">
                                                                    </center>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div style="" class="accordion-body">
                                                        <p style="font-size: 22px; font-weight: bold; color:red; text-align:center;">Proyectos:</p>
                                                        @foreach ($projects as $project)
                                                            @if ($project->subcategory_id == $subcategory->id && $project->theme_type == 'project' && $project->is_enable == 1)
                                                                <div style="display:inline-block; max-width: 200px; margin:10px;">
                                                                    <p style="text-align:center; font-size:15px; font-weight:bold; font-style: italic; word-wrap: break-word; color:darkgreen;">{{$project->name}}</p>
                                                                    <center>
                                                                        <img class="img-responsive" style="width:150px; height:100px; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                                        <input style="display: block; width: 30px; height: 30px;" class="form-check-input" type="checkbox" name="projectCheck[]" id="projectCheck{{$project->id}}" value="{{$project->id}}" onclick="getIDS({{$project->id}})">
                                                                    </center>
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
                    <input type="hidden" name="classroom_id" value="{{$classroom_id}}">
                    <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Crear">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    </script>
@endsection
