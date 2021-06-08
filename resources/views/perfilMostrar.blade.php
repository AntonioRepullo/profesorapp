@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ asset('css/perfilMostrar.css') }}" rel="stylesheet">

</head>

<body>
<div class="container">
    <div class="main-body">
        <!-- /Breadcrumb -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                 class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>Prueba de Perfil</h4>
                                <p class="text-secondary mb-1">Full Stack Developer</p>
                                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rating card">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5"/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3"/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2"/>
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1"/>
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Correo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php
                                $users = DB::select('select * from users where id=1');

                                foreach ($users as $user) {
                                    echo $user->email;
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nombre completo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php
                                $users = DB::select('select * from users where id=1');

                                foreach ($users as $user) {
                                    echo $user->name;
                                }
                                ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Teléfono primario</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php
                                $users = DB::select('select * from users where id=1');

                                foreach ($users as $user) {
                                    echo $user->phone;
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Dirección</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php
                                $users = DB::select('select * from users where id=1');

                                foreach ($users as $user) {
                                    echo $user->location;
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " target="__blank" href="perfilEditar">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h6 class="mb-0 text-center text-primary">Precios</h6>
                    <div class="">
                        1 clase 8€ la hora, 10 clases bono 7€ la hora
                    </div>
                </div>
            </div>
            <div class="card col-8">
                <div class="card-body">
                    <h6 class="mb-0 text-center text-primary">Experiencia</h6>
                    <div class="">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.
                    </div>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h6 class="mb-0 text-center text-primary">Metodología</h6>
                    <div class="">
                        Forma en la que se imparten sus clases
                    </div>
                </div>
            </div>
            <div class="card col-8">
                <div class="card-body">
                    <h6 class="text-primary mb-0 text-center">Observaciones</h6>
                    <div class="">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


</body>

</html>
@endsection
