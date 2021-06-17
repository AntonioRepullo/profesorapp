@extends('layouts.app')

@section('content')
<?php
$idUsuario = $_GET['user'];
$users = DB::select('select * from users where id=' . $idUsuario);
$user = $users[0];
$idTimeTable = DB::select('select * from timetable where id_user=' . $user->id);
$idTimeTable=$idTimeTable[0];
$mydate = getdate(date('U'));
$fecha = new DateTime();
$fecha = $fecha->getTimestamp();
$userLoged = auth()->user();


?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Scripts-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/perfilMostrar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

</head>

<body>
<div class="container">
    <div class="main-body">
        <!-- /Breadcrumb -->
        <div class="row gutters-sm">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Correo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php
                                echo $user->email;
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
                            echo $user->name;
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
                                echo $user->phone;
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Dirección</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="posicion">
                                <?php
                                echo $user->location;
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6>Valoración</h6>
                            </div>
                            <div class="col-sm-9 text-secondary row">
                                <?php
                                $valoracionTotal=DB::select('SELECT (SUM(value)/COUNT(value)) as resultado FROM ratings WHERE id_user='.$user->id);
                                $valoracionTotal=$valoracionTotal[0];
                                echo round(floatval($valoracionTotal->resultado));
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">';
                                echo '<path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>';
                                echo '</svg>';
                                echo ' &nbsp; totales sobre 5 &nbsp;';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">';
                                echo '<path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>';
                                echo '</svg>';
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Valorar</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <form id="search-form" method="get" action='valorar'>
                                <input type='hidden' value="<?php echo $user->id?>" name="user">
                                <input type='hidden' value="<?php echo $userLoged->id?>" name="student">
                                <select name="value">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                </svg>
                                <button type="submit" class="btn btn-link">valorar</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-12">
                <div class="card-body">
                    <h6 class="mb-0 text-center text-primary">Localización</h6>
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div id="map"></div>
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------------------------------------------------------------------------------->

                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h6 class="mb-0 text-center text-primary">Precios</h6>
                    <div class="">
                        <?php
                        $user->experience;
                        ?>
                    </div>
                </div>
            </div>
            <div class="card col-8">
                <div class="card-body">
                    <h6 class="mb-0 text-center text-primary">Experiencia</h6>
                    <div class="">
                        <?php
                        $user->experience;
                        ?>
                    </div>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h6 class="mb-0 text-center text-primary">Metodología</h6>
                    <div class="">
                        <?php
                        $user->methodology;
                        ?>
                    </div>
                </div>
            </div>
            <div class="card col-8">
                <div class="card-body">
                    <h6 class="text-primary mb-0 text-center">Observaciones</h6>
                    <div class="">
                        <?php
                            $user->observations
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="timetable-img text-center">
                <img src="img/content/timetable.png" alt="">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="<?php echo $idTimeTable->id; ?>">
                    <thead>
                    <tr class="bg-light-green">
                        <?php
                        echo "$mydate[wday] $mydate[month] $mydate[mday] $mydate[year]";
                        ?>
                        <th class="text-uppercase">Hora
                        </th>
                        <th class="text-uppercase">Lunes</th>
                        <th class="text-uppercase">Martes</th>
                        <th class="text-uppercase">Miércoles</th>
                        <th class="text-uppercase">Jueves</th>
                        <th class="text-uppercase">Viernes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $solicitudes = DB::select('select * from request where id_timetable='.$idTimeTable->id);
                    $horario = DB::select('select starting_hour as inicio, ending_hour as final from timetable where id='.$idTimeTable->id);
                    $horario = $horario[0];
                    $solicitudesPendientes[]="";
                    for ($z=0;$z<count($solicitudes);$z++){
                        if($solicitudes[$z]->state=='pendiente'){
                            $solicitudesPendientes[$z]=$solicitudes[$z]->position;
                        }
                    }
                    $solicitudesReservadas[]="";
                    for ($z=0;$z<count($solicitudes);$z++){
                        if($solicitudes[$z]->state=='reservada'){
                            $solicitudesReservadas[$z]=$solicitudes[$z]->position;
                        }
                    }
                    for ($a = $horario->inicio; $a <= $horario->final; $a++) {
                        echo "<tr>";
                        echo "<td>" . $a . ":00" . "</td>";
                        for ($b = 1; $b <= 5; $b++) {
                            $id = $a . "." . $b;
                            $Libre = "
                            <td id=\"$id\">
                            <form method=\"get\" action='/insertMostrar'>
                            <input type='hidden' value=$user->id name='user'>
                            <input type='hidden' value=$userLoged->id name='studentUser'>
                            <input type='hidden' value=$idTimeTable->id name='idTimeTable''>
                            <input type='hidden' value='pendiente' name='pendiente'>
                            <input type='hidden' value=$id name='id'>
                            <input type='hidden' value=$fecha name='fecha'>
                            <button type=\"submit\" class=\" btn bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Libre
                            </button>
                            </form>
                            </td>";

                            $Ocupado = "<td id=\"$id\"> <span class=\"bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Ocupado</span> </td>";
                            $Pendiente = "<td id=\"$id\"> <span class=\"bg-orange padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Pendiente</span> </td>";
                            $salida = $Libre;
                            foreach ($solicitudesPendientes as $solicitudPendiente) {
                                if ($solicitudPendiente == $id) {
                                    $salida = $Pendiente;
                                }
                            }
                            foreach ($solicitudesReservadas as $solicitudReservada) {
                                if ($solicitudReservada == $id) {
                                    $salida = $Ocupado;
                                }
                            }
                            echo $salida;
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


</body>
<script type="text/javascript" src="{{ URL::asset('js/perfilMostrar.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
</html>
@endsection
