@extends('layouts.app')

@section('content')
<?php
use Illuminate\Support\Facades\DB;

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

    <title>Laravel</title>


    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('js/perfilEditar.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/perfilEditar.css') }}" rel="stylesheet">

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
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <form class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Correo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input readonly type="text" class="form-control" value="<?php echo $user->email?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nombre completo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="name" value="<?php echo $user->name; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Teléfono primario</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="phone"
                                       value="<?php echo $user->phone; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Dirección</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="location"
                                       value="<?php echo $user->location;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Guardar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-4 d-flex justify-content-end">
            <div class="card-body">
                <h6 class="mb-0 text-center text-primary">Asignaturas</h6>
                <div >
                    <table>
                    <?php
                        $asignaturasTotales=DB::select('SELECT * FROM subject');
                        $asignaturas=DB::select('
                            SELECT s.name as nombre,
                            s.level as nivel,
                            us.id as idUserSubject
                            FROM subject as s
                            JOIN usersubject us ON s.id=us.id_subject
                            JOIN users u ON us.id_user=u.id
                            WHERE us.id_user='.$idUsuario);
                        foreach ($asignaturas as $asignatura){
                            echo '
                            <tr>
                                <form method="get" action=\'delete\'>
                                    <td>'.$asignatura->nombre.' de nivel '.$asignatura->nivel.'
                                        <input type=\'hidden\' value="'.$user->id.'" name=\'user\'>
                                        <input type=\'hidden\' value="'.$asignatura->idUserSubject.'" name=\'userSubjectId\'>
                                        <button  type="submit" class="btn btn-danger" style="float: right;"> Eliminar </button></td>
                                    </td>
                                </form>
                            </tr>
                            ';
                        }

                        echo '
                        <tr>
                        <form method="get" action=\'insertAsignatura\'>
                        <td>
                        <label for="asignaturas">Elige asignatura:</label>
                        <input type=\'hidden\' value="'.$user->id.'" name=\'user\'>
                        <input type=\'hidden\' value="'.$user->id.'" name=\'idUserSubject\'>
                        <select id="idSubjectUser" name="idSubjectUser">';
                        foreach ($asignaturasTotales as $asignaturaTotal){
                            echo '<option value="'.$asignaturaTotal->id.'">'.$asignaturaTotal->name.' de '.$asignaturaTotal->level.'</option>';
                        }
                        echo '
                        </select>
                        <input class="btn btn-primary" type="submit" value="Añadir">
                        </form>
                        </td></tr>';
                    ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card col-4 d-flex justify-content-end">
            <div class="card-body">
                <h6 class="mb-0 text-center text-primary">Clases Reservadas</h6>
                <div >
                    <table>
                        <?php
                        $days = array(
                            1 => 'lunes',
                            2 => 'martes',
                            3 => 'miércoles',
                            4 => 'jueves',
                            5 => 'viernes'
                        );
                        $solicitudesMostrar = DB::select('select * from request where id_timetable='.$idTimeTable->id);
                        foreach ($solicitudesMostrar as $solicitudMostrar) {
                            if($solicitudMostrar->state=='reservada'){
                            $alumnos = DB::select('select * from users where id=' . $solicitudMostrar->id_user);
                            $alumno = $alumnos[0];
                            $reserva=$solicitudMostrar->position;
                            $valor=explode('.',$reserva);
                            $dia=$days[$valor[1]];
                            $hora=$valor[0];
                            echo '
                        <tr>
                        <form method=\"get\" action=\'/deleteRequest\'>
                        <input type=\'hidden\' value="'.$user->id.'" name=\'user\'>
                        <input type=\'hidden\' value="'.$solicitudMostrar->id.'" name=\'requestId\'>
                        <td>'.$alumno->name.':  '.$dia.' a las '.$hora.' <button type="submit" class="btn btn-danger" style="float: right;"> Eliminar </button></td>
                        </form>
                        </tr>
                        ';
                        }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card col-4 d-flex justify-content-end">
            <div class="card-body">
                <h6 class="mb-0 text-center text-primary">Solicitudes</h6>
                <div>
                    <table>
                    <?php
                        $days = array(
                            1 => 'lunes',
                            2 => 'martes',
                            3 => 'miércoles',
                            4 => 'jueves',
                            5 => 'viernes'
                        );
                    $solicitudesMostrar = DB::select('select * from request where id_timetable='.$idTimeTable->id);
                    foreach ($solicitudesMostrar as $solicitudMostrar) {
                        if($solicitudMostrar->state =='pendiente'){
                        $alumnos = DB::select('select * from users where id=' . $solicitudMostrar->id_user);
                        $alumno = $alumnos[0];
                        $reserva=$solicitudMostrar->position;
                        $valor=explode('.',$reserva);
                        $dia=$days[$valor[1]];
                        $hora=$valor[0];
                        echo '
                        <tr>
                        <td>'.$alumno->name.' el '.$dia.' a las '.$hora.'
                        <form method=\"get\" action=\'/update\'>
                        <input type=\'hidden\' value="'.$user->id.'" name=\'user\'>
                        <input type=\'hidden\' value="'.$solicitudMostrar->id.'" name=\'requestId\'>
                        <button name="update" type="submit" class="btn btn-primary" style="float: right"> Aceptar </button>
                        </form>
                        <form method=\"get\" action=\'/deleteRequest\'>
                        <input type=\'hidden\' value="'.$user->id.'" name=\'user\'>
                        <input type=\'hidden\' value="'.$solicitudMostrar->id.'" name=\'requestId\'>
                        <button  type="submit" class="btn btn-danger" style="float: right;"> Eliminar </button></td>
                        </form>
                        </tr>
                        ';
                    }
                    }
                    ?>
                    </table>
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
                            <form method=\"get\" action='/insert'>
                            <input type='hidden' value=$user->id name='user'>
                            <input type='hidden' value=$userLoged->id name='studentUser'>
                            <input type='hidden' value=$idTimeTable->id name='idTimeTable''>
                            <input type='hidden' value='pendiente' name='pendiente'>
                            <input type='hidden' value=$id name='id'>
                            <input type='hidden' value=$fecha name='fecha'>
                            <button  type=\"submit\" class=\" btn bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Libre
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

</body>

</html>
@endsection
