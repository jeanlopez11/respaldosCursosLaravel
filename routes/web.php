<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\ShowPosts;
use App\Models\Destination;
use App\Models\Flight;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//CURSO ELOQUENT AVANZADO
Route::get('/prueba', function () {
    // return view('prueba');
    $destination = Destination::addSelect([
        'last_flight' => Flight::select('number')
                        ->whereColumn('destination_id', 'destinations.id')
                        ->orderBy('arrived_at', 'desc')
                        ->limit(1)
    ])->get();
    return $destination;
});

#NOTIFICACIONES
Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');


//TERMINA CURSO ELOQUENT AVANZADO
Route::resource('posts', PostController::class);


#RUTAS CON AUTENTIACION USUARIO
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#RUTAS CON AUTENTIACION DE USUARIOS Y A SU VEZ DEBEN ESTAR VERIFICADAS
Route::group(["middleware" => ['auth']], function () {
    Route::get('/dashboard', [PostController::class, 'dashboard'] )->name('dashboard');
    Route::get('/notificaciones', [PostController::class, 'notificaciones'] )->name('notificaciones');
    
    Route::get('/admin', function () {
        return view('dash.index');
    })->name('dashboard');
    Route::get('/pruebas', function () {
        return view('pruebas');
    })->name('pruebas');
    Route::get('/pruebas-layout', function () {
        return view('prueba-layout');
    })->name('pruebas-layout');
    Route::get('/pruebas-login', function () {
        return view('auth.login-new');
    })->name('pruebas-login');
    Route::get('/gluzze', [ProfileController::class, 'edit'])->name('profile.edit');
   
    Route::get('/gluzze', [PostController::class, 'Getgluzze'])->name('gluzze.get');
    //aca puedes segir colocando las paginas o recursos que quieres cargar mientras en usuario este autenticado y verificado...
});

#RUTAS DE AUTENTICACIÓN BREEZE LOGIN, REGISTRO, VALADACIONES CORREO Y CONTRASEÑA
require __DIR__.'/auth.php';

// Route::get('posts', [PostController::class,'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
###ES LO MISMO, PARA QUE FUNCIONE DEBEN EXISTIR LOS 7 METODOS CREADOS EN EL CONTROLADOR
// Route::resource('posts', PostController::class);
###SI SOLO QUIERES QUE FUNCIONE ALGUNOS METODOS, PUEDES USAR EL METODO ONLY O EXCEPT PARA QUE SE EXCLUYAN LOS METODOS QUE NO QUIERES QUE FUNCIONEN
###TAMBIEN SE LE PUEDE PASAR NAMES('NOMBRE DE LA RUTA') PARA QUE SE LE ASIGNE UN NOMBRE A LAS RUTAS
// Route::resource('posts', PostController::class)->only(['index', 'show']);


// CONSULTAS CRUZADAS
// Route::get('/prueba', function () {
//     // return view('prueba');
//     $destination = Destination::addSelect([
//         'last_flight' => Flight::select('number')
//                         ->whereColumn('destination_id', 'destinations.id')
//                         ->orderBy('arrived_at', 'desc')
//                         ->limit(1)
//     ])->get();
//     return $destination;
// });
