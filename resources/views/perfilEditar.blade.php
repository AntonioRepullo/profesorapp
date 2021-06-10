@extends('layouts.app')

@section('content')
<?php
$idUsuario = $_GET['user'];
$users = DB::select('select * from users where id=' . $idUsuario);
$user = $users[0];
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <!-- Scripts -->

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
                                    <input  readonly type="text" class="form-control" value="john@example.com">
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
                                    <input type="text" class="form-control" value="(239) 816-9029">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Dirección</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="Bay Area, San Francisco, CA">
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
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="bg-light-green">
                            <th class="text-uppercase">Time
                            </th>
                            <th class="text-uppercase">Monday</th>
                            <th class="text-uppercase">Tuesday</th>
                            <th class="text-uppercase">Wednesday</th>
                            <th class="text-uppercase">Thursday</th>
                            <th class="text-uppercase">Friday</th>
                            <th class="text-uppercase">Saturday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">09:00am</td>
                            <td>
                                <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            </td>

                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            </td>
                            <td>
                                <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Dance</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">10:00am</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            </td>
                            <td class="bg-light-green">

                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            </td>
                            <td class="bg-light-green">

                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">11:00am</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">12:00pm</td>
                            <td class="bg-light-green">

                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            </td>
                            <td>
                                <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Dance</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            </td>
                            <td class="bg-light-green">

                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">01:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            </td>
                            <td class="bg-light-green">

                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">02:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">03:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">04:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">05:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">06:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">07:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">08:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">09:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">10:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">11:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">12:00pm</td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Libre</span>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

</body>

</html>
@endsection
