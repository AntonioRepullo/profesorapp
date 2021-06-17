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
function valorar($id_user, $id_student,$value){
    DB::insert('insert into ratings (id_user, id_student, value ) values ('.$id_user.', '.$id_student.', '.$value.')');
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
Route::get('/valorar', function () {
    if (isset($_GET["value"])||isset($_GET["user"])){
        valorar($_GET["user"],$_GET["student"],$_GET["value"]);
        return view('perfilMostrar');
    }
});
Route::get('/perfil', function () {
    if (isset($_GET["user"])){
        return 'perfilMostrar';
    }
});

 Route::get('/', function () {
    return view('home');

});
Route::get('/insert', function () {
    if (isset($_GET["studentUser"])){
        insertRequest( $_GET["studentUser"],$_GET["idTimeTable"],$_GET["pendiente"],$_GET["id"],$_GET["fecha"]);
        return view('perfilEditar');
    }

    return 'welcome';
});
Route::get('/insertMostrar', function () {
    if (isset($_GET["studentUser"])){
        insertRequest( $_GET["studentUser"],$_GET["idTimeTable"],$_GET["pendiente"],$_GET["id"],$_GET["fecha"]);
        return view('perfilMostrar');
    }

    return 'welcome';
});
Route::get('/insertAsignatura', function () {
    if (isset($_GET["idUserSubject"])||isset($_GET["user"])) {
        insertUserSubject($_GET["idUserSubject"], $_GET["idSubjectUser"]);
        return view('perfilEditar');
    }
    return 'welcome';
});
Route::get('/deleteRequest', function () {

    if (isset($_GET["requestId"])||isset($_GET["user"])){
        deleteRequest($_GET["requestId"]);
        return view('perfilEditar');
    }
    return 'welcome';
});
Route::get('/delete', function () {
    if (isset($_GET["userSubjectId"])||isset($_GET["user"])){
        deleteUserSubject($_GET["userSubjectId"]);
        return view('perfilEditar');
    }
    return 'welcome';
});
Route::get('/update', function () {
    if (isset($_GET["requestId"])||isset($_GET["user"])){
        updateRequest($_GET["requestId"]);
        return view('perfilEditar');
    }
    return 'welcome';
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [App\Http\Controllers\perfilMostrarController::class, 'index'])->name('perfilMostrar');
Route::get('/perfilEditar', [App\Http\Controllers\perfilEditarController::class, 'index'])->name('perfilEditar');
