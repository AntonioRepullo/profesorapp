@extends('layouts.app')

@section('content')
<?php
$idUsuario = $_GET['user'];
$users = DB::select('select * from users where id=' . $idUsuario);
$user = $users[0];
$mydate=getdate(date("U"));
$solicitudesPendientes=['3.3','4.4','5.5'];
$solicitudesAceptadas=['1.1','2.2','4.1'];

implode(", ",$solicitudesPendientes);


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
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
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
                                    <input  readonly type="text" class="form-control" value="<?php echo $user->email?>">
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
                                    <input type="text" class="form-control" name="phone" value="<?php echo $user->phone; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Dirección</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="location" value="<?php echo $user->location;?>">
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

        <div class="container">
            <div class="timetable-img text-center">
                <img src="img/content/timetable.png" alt="">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="myTable">
                    <thead>
                        <tr class="bg-light-green">
                            <?php
                            echo "$mydate[wday] $mydate[month] $mydate[mday] $mydate[year]";
                            ?>
                            <th class="text-uppercase">Time
                            </th>
                            <th class="text-uppercase">Monday</th>
                            <th class="text-uppercase">Tuesday</th>
                            <th class="text-uppercase">Wednesday</th>
                            <th class="text-uppercase">Thursday</th>
                            <th class="text-uppercase">Friday</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($a = 1; $a <= 6; $a++) {
                        echo "<tr>";
                        echo "<td>".$a.":00"."</td>";
                        for($b = 1; $b <= 5; $b++) {
                            $id=$a.".".$b;
                            $Libre="<td id=\"$id\">
                            <span class=\"bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Libre</span>
                            </td>";
                            $Ocupado="<td id=\"$id\">
                            <span class=\"bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Ocupado</span>
                            </td>";
                            $Pendiente="<td id=\"$id\">
                            <span class=\"bg-orange padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13\">Pendiente</span>
                            </td>";
                            $salida=$Libre;
                            foreach ($solicitudesAceptadas as $solicitud){
                                if ($solicitud == $id){
                                    $salida=$Ocupado;
                                }
                            }
                            echo $salida;
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <input type = "button" onclick = "solicitar(<?php echo "[".implode(",",$solicitudesPendientes)."]" ;?>)" value = "Configurar">
            </div>
        </div>

</body>

</html>
@endsection
