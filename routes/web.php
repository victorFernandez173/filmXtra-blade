<?php

use App\Http\Controllers\BienvenidaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BienvenidaController::class, 'bienvenida'])->name('inicio');
Route::view('/top-filmxtra', 'top-filmxtra')->name('top-filmxtra');
Route::view('/top-valoraciones', 'top-valoraciones')->name('top-valoraciones');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// TODO terminar login: recuerdame como funciona?, vistas de olvidaste contraseña y registrarse empezar a mostrarlas
// TODO generar inserts sin procedures
// TODO carResetPassword en authenticatedSessionController estudiar




// TODO laracasts y curso profesional laravel youtube
// TODO metodo buscarTitulo() eliminado de BienvenidaController, para el campo de busqueda, reañadir/configurar
// TODO en la pagina de usuario se debería esconder el bloque de contraseña para cuentas o'auth
// TODO al modificar la ruta de una obra, solo añadiendo caracteres en el trozo del titulo, se intenta acceder a esa obra pero claro, NO EXISTE y da un error de array[0] nulo porque claro no hay obra ESTUDIAR
// TODO codigo ficha valoraciones, solucionar
// TODO aplicar video optimización de código de favoritos element {& optimizaciones de rutas & optimizaciones de consultas??
// TODO eventserviceprovider event envio mail registros puede ser util?
// TODO event en RegisteredUserController, implementar para algo
// TODO 'route model binding' para las rutas de obra
// TODO rutas agrupadas por bloques
// TODO rediseño rutas ej. una ruta para poner crítica otra para modificarla
// TODO chequear consultas & inyección de dependencias (service container)
// TODO sección de la web: listas propias/usuarios
// TODO honeypot (tallpad)
// TODO evaluación/criticas en el perfil de usuario
// TODO podcast en el permanent layout
// TODO avatar de usuario, completar las posibilidades de edición de datos personales en pagina de usuario
// TODO sección fotos de pelicula
// TODO roles para los gestores en una posible futura sección de gestion de datos
// TODO notificaciones de algún tipo?? likes? criticas? estudiar (bootcamp ojear codigo)
// TODO policies para las modificaciones (bootcamp ojear codigo)
// TODO api de cines? hay algo?
// TODO error 404 y otras paginas de error mejorar configuración
// TODO mail, documentación al final de bootcamp
// TODO despliegue? posibilidades
// TODO ordenamiento: de críticas, otros ordenamientos para obras...
// TODO buscador mejorar: paginación, mensajes con los resultados...
// TODO session bbdd driver, tabla con almacenamiento de sesiones
// TODO pop ups para el logueo, registro, likes...
// TODO enlace correo filmxtra en footer layout lleva a formulario para contacto con nosotros: ssugerencias etc...
