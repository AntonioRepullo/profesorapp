<?php

use Illuminate\Support\Facades\Route;
function insertRequest($id_user, $id_timetable, $state, $position, $timeStamp){
    $state='\''.$state.'\'';
    $position='\''.$position.'\'';
    $timeStamp='\''.$timeStamp.'\'';
    DB::insert('insert into request (id_user, id_timetable, state, position, timeStamp) values ('.$id_user.', '.$id_timetable.', '.$state.', '.$position.', '.$timeStamp.')');
}
function insertUserSubject($id_user, $id_subject){
    DB::insert('insert into usersubject (id_user, id_subject) values ('.$id_user.', '.$id_subject.')');
}
function deleteRequest($idRequest){
    DB::table('request')
        ->where('id',$idRequest)
        ->delete();
}
function deleteUserSubject($idUserSubject){
    DB::table('usersubject')
        ->where('id',$idUserSubject)
        ->delete();
}
function updateRequest($idRequest){
    DB::table('request')
        ->where('id',$idRequest)
        ->update(['state' => 'reservada']);
}
Route::get('/busqueda', function () {
    if (isset($_GET["asignatura"])){
        return view('busqueda');
    }
});
Route::get('/perfilEditar', function () {
    if (isset($_GET["user"])){
        return view('perfilEditar');
    }
});

 Route::get('/', function () {
    return view('welcome');

});
Route::get('/insert', function () {
    if (isset($_GET["usrId"])){
        insertRequest( $_GET["usrId"],$_GET["idTimeTable"],$_GET["pendiente"],$_GET["id"],$_GET["fecha"]);
        return;
    }
    if (isset($_GET["idUserSubject"])) {
        echo $_GET["idUserSubject"];
        echo $_GET["idSubjectUser"];
        insertUserSubject($_GET["idUserSubject"], $_GET["idSubjectUser"]);
        return;
    }
    return 'welcome';
});
Route::get('/delete', function () {
    if (isset($_GET["requestId"])){
        echo $_GET["requestId"] . "<br>";
        deleteRequest($_GET["requestId"]);
        return;
    }
    if (isset($_GET["userSubjectId"])){
        echo $_GET["userSubjectId"] . "<br>";
        deleteUserSubject($_GET["userSubjectId"]);
        return;
    }
    return 'welcome';
});
Route::get('/update', function () {
    if (isset($_GET["requestId"])){
        updateRequest($_GET["requestId"]);
        return;
    }
    return 'welcome';
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [App\Http\Controllers\perfilMostrarController::class, 'index'])->name('perfilMostrar');
Route::get('/perfilEditar', [App\Http\Controllers\perfilEditarController::class, 'index'])->name('perfilEditar');
