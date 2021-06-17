@extends('layouts.app')

@section('content')
<?php
    $profesores=DB::select('SELECT u.id as idUser, u.name as name, u.location as location, u.pricing as pricing FROM users as u JOIN usersubject us ON u.id=us.id_user JOIN subject s ON us.id_subject=s.id WHERE s.id='.$_GET["asignatura"]);

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <!-- Styles -->
    <link href="{{ asset('css/busqueda.css') }}" rel="stylesheet">

</head>

<body>
<div class="container">
<div class="row">
    <div class="col-12">
        <div class="card card-margin">
            <div class="card-body">
                <div class="row search-body">
                    <div class="col-lg-12">
                        <div class="search-result">
                            <div class="result-body">
                                <form id="search-form" method="get" action='perfil'>
                                <table class="table widget-26">
                                    <thead>
                                        <tr>
                                            <td class="text-header">Nombre</td>
                                            <td class="text-header">Localidad</td>
                                            <td class="text-header">Precio por hora</td>
                                            <td class="text-header">Valoración</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($profesores as $profesor){
                                        $valoracionTotal=DB::select('SELECT (SUM(value)/COUNT(value)) as resultado FROM ratings WHERE id_user='.$profesor->idUser);
                                        $valoracionTotal=$valoracionTotal[0];
                                        $salida= round(floatval($valoracionTotal->resultado));
                                        $idEnviar=$profesor->idUser;

                                        echo    '<tr>';
                                        echo    '<td >';
                                        echo    '<form id="search-form" method="get" action=\'perfil\'>';
                                        echo    '<span>'.$profesor->name.'</span>';
                                        echo    '<input type=\'hidden\' value="'.$idEnviar.'" id="user"name=user>';
                                        echo    '<input type=\'hidden\' value="'.$profesor->location.'" id="location"name=location>';
                                        echo    '<button type="submit " class="btn btn-link">  Ir </button></td>';
                                        echo    '</form></td>';
                                        echo '<td>'.$profesor->location.'</td>';
                                        echo '<td>'.$profesor->pricing.'</td>';
                                        echo '<td><div class="row"><span>'.$salida.'</span>';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">';
                                        echo '<path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>';
                                        echo '</svg></div></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
@endsection
