<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Página Principal
Route::view('/', 'index')->name('index');

// Grupo para ALUMNOS (con middleware 'auth')
Route::prefix('alumno')->name('alumno.')->middleware('auth')->group(function () {
    Route::view('/inscripcion', 'alumno.inscripcion')->name('inscripcion');
    Route::view('/kardex', 'alumno.kardex')->name('kardex');
    Route::view('/informacion-personal', 'alumno.informacion_personal_alumno')->name('info_personal');
    Route::view('/grupo-inscrito', 'alumno.grupo_inscrito')->name('grupo_inscrito');
    Route::view('/secciones', 'alumno.secciones')->name('secciones');
});

// Grupo para ADMINISTRADORES (también con middleware 'auth')
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::view('/grupos', 'administrador.grupos_finales')->name('grupos');
    Route::view('/alumnos', 'administrador.informacion_alumnados')->name('alumnos');
});

// Grupo para Vistas Generales
Route::prefix('general')->name('general.')->group(function () {
    Route::view('/foro', 'general.foro')->name('foro');
    Route::view('/foro-respuestas', 'general.foro_respuestas')->name('foro_respuestas');
    Route::view('/placement-test', 'general.placement_test')->name('placement_test');
    Route::view('/inicio-sesion', 'general.inicio_sesion')->name('inicio_sesion');
    Route::view('/registro', 'general.registro')->name('registro');
    Route::get('/gestion_usuarios', [UserController::class, 'show_users'])->name('gestion_usuarios'); //Cambiar esto
    Route::delete('/gestion_usuarios/{id}', [CrudController::class, 'delete'])->name('usuarios.delete'); //Cambiar esto
    Route::view('/realizar-registro', 'general.realizar_registro')->name('realizar_registro');
    Route::view('/resultados-inscripcion', 'general.resultados_inscripcion')->name('resultados_inscripcion');
    Route::view('/resultados-pt', 'general.resultados_pt')->name('resultados_pt');
    Route::get('/dashboard', [UserController::class, 'show_user'])->name('dashboard');
});

// Login de usuarios
Route::post('/validar-login', [LoginController::class, 'login'])->name('validar-login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // POST es la mejor práctica para logout



// Crud completo
Route::post('registrar-usuario', [CrudController::class, 'create'])->name('registrar-usuario');
