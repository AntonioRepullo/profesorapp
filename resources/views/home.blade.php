@extends('layouts.app')

@section('content')
<?php
$asignaturasTotales=DB::select('SELECT * FROM subject');
?>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
<div>
<div class="row buscador">
    <div class="col-6 card-margin">
        <div class="card search-form ">
            <div class="card-body p-0">
                <form id="search-form" method="get" action='busqueda'>
                    <div>
                        <h1 class="textoSuperior">¿Que asignatura deseas aprender hoy?</h1>
                        <div>
                            <div class="row no-gutters">
                                <div class="col-9  ">
                                    <select id="asignatura" name="asignatura" class="form-control">
                                        <?php
                                        foreach ($asignaturasTotales as $asignaturaTotal){
                                            echo '<option value="'.$asignaturaTotal->id.'">'.$asignaturaTotal->name.' de '.$asignaturaTotal->level.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <
</div>

</body>

</html>
@endsection
