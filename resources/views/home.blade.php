@extends('layouts.dashboard')
@section('content')
    @hasrole('Administrator')
    <div class="container-fluid py-4">
        <div class="row">
            <img class="text-center" style="border-radius: 35px;" width="940px" height="300px" src="/assets/images/bannerRS.jpg">
            <div  class="col-12">
                <div class="card mb-1 p-4">
                    <div class="jumbotron jumbotron-fluid">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fas fa-landmark opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 ">
                                        <h6 class="text-center mb-0">Colegios</h6>
                                        <a href="/schools/create" class="text-xs"><i class="fas fa-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo colegio</a>
                                        </br>
                                        <a href="/schools" class="text-xs"><i class="fas fa-landmark opacity-10 ps-4 mx-lg-2"></i>Mis colegios</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style="margin-left: 8px; margin-top: 8px;" width="40px" height="40px" src="/assets/images/coordi.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3">
                                            <h6 class="text-center mb-0">Coordinadores</h6>
                                            <a href="/coordinators/create" class="text-xs"><i class="fas fa-user-plus opacity-10 ps-3 mx-lg-2"></i>Nuevo coordinador</a>
                                            </br>
                                            <a href="/coordinators" class="text-xs"><i class="fas fa-user-tie opacity-10 ps-3 mx-lg-2"></i>Ver coordinadores</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                            <img class="text-center" style=" margin-top: 18px;" width="35px" height="30px" src="/assets/images/category.png">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 ">
                                        <h6 class="text-center mb-0">Categorías</h6>
                                        <a href="/categories/create" class="text-xs"><i class="fas fa-folder-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo categoría</a>
                                        </br>
                                        <a href="/categories" class="text-xs"><i class="fas fa-folder opacity-10 ps-4 mx-lg-2"></i>Mis categorías</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                            <img class="text-center" style=" margin-top: 14px;" width="30px" height="35px" src="/assets/images/tema.png">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 ">
                                        <h6 class="text-center mb-0">Temas</h6>
                                        <a href="/categories/create" class="text-xs"><i class="fas fa-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo tema</a>
                                        </br>
                                        <a href="/categories" class="text-xs"><i class="fas fa-file-alt opacity-10 ps-4 mx-lg-2"></i>Mis temas</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endhasrole
    @hasrole('Coordinator')
    <div class="container" style="background-color: #FFF; z-index: 999999">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1 class="text-center">Hola Coordinator</h1>

                </center>
            </div>

        </div>
    </div>
    @endhasrole
    @hasrole('Student')
    <div class="container" style="background-color: #FFF; z-index: 999999">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1 class="text-center">Hola Student</h1>

                </center>
            </div>

        </div>
    </div>
    @endhasrole
    @hasrole('Teacher')
    <div class="container" style="background-color: #FFF; z-index: 999999">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1 class="text-center">Hola Teacher</h1>

                </center>
            </div>

        </div>
    </div>
    @endhasrole
@endsection
