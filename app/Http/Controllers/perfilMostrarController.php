<?php
namespace App\Http\Controllers;

class perfilMostrarController extends Controller
{
    public function getUser(){

        $idUsuario = $_GET['user'];
        $users = DB::select('select * from users where id=' . $idUsuario);
//TODO COMPROBAR QUE RECIBO AUNQUE SEA UNA MONEDA
        $user = $users[0];
        return $user;

        }
}
?>
