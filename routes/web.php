<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CrudCursosController;
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
    // Crud Usuarios - completo
    Route::post('>/registrar-usuario', [CrudController::class, 'create'])->name('registrar-usuario');
    Route::delete('/borrar_usuarios/{id}', [CrudController::class, 'delete'])->name('usuarios.delete');
    Route::get('/registro', [CrudController::class, 'read'])->name('registro');
    Route::get('/actualiza_usuario/{id}', [CrudController::class, 'update'])->name('actualiza_usuario');
    Route::post('/update_alumno/{tipo}/{id_alumno}', [CrudController::class, 'update_alumno'])->name('update_alumno');
    Route::post('/update_docente/{tipo}/{id_docente}', [CrudController::class, 'update_docente'])->name('update_docente');
    //Crud Cursos - completo
    Route::get('/registro_cursos', [CrudCursosController::class, 'read'])->name('registro_cursos');
    Route::post('/registrar-curso', [CrudCursosController::class, 'create'])->name('registrar-curso');
});

// Grupo para Vistas Generales con auttenticación
Route::prefix('general')->name('general.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'show_user'])->name('dashboard');
});

// Grupo para Vistas Generales
Route::prefix('general')->name('general.')->group(function () {
    Route::view('/inicio-sesion', 'general.inicio_sesion')->name('inicio_sesion');

    // Login y logout de usuarios
    Route::post('/validar-login', [LoginController::class, 'login'])->name('validar-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // POST es la mejor práctica para logout
});



