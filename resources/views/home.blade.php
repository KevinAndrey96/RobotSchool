@extends('layouts.dashboard')
@section('content')
    @hasrole('Administrator')
    <div class="container" style="background-color: #FFF; z-index: 999999">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1 class="text-center">Hola Admin1</h1>

                </center>
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
