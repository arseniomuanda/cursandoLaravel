<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('welcome');
});

Route::get('/getting', function () {
    return 'Hello World';
});

Route::any('/any', function () {
    return 'Permite todo tipo de acesso http (put, delete, get, post)';
});

Route::match(['delete', 'put'], '/match', function () {
    return 'Teste';
});

#routa com parametros
Route::get('/cliente/{id}/{cat?}', function ($id, $car = '') {
    return "O id do cliente é $id";
});


#redirecionamento
/* Route::get('/sobre', function(){
    return redirect('/teste');
}); */

Route::redirect('/sobre', '/teste');

#tambem podemos indicar directamente para uma view
Route::view('/meu', 'welcome');

#rotas nomeadas
Route::get('suer/time', function () {
    return view('welcome');
})->name('perfil');

Route::get('/users', function () {
    return redirect()->route('admin.users');
});


#grupo de routas por perfixe
/* Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return 'users';
    });
    Route::get('persons', function () {
        return 'persons';
    });
    Route::get('cars', function () {
        return 'cars';
    });
    Route::get('bikes', function () {
        return 'bikes';
    });
});
 */
#grupo de rotas por name
/* Route::name('admin.')->group(function () {
    Route::get('admin/users', function () {
        return 'users';
    })->name('users');

    Route::get('admin/persons', function () {
        return 'persons';
    })->name('persons');

    Route::get('admin/cars', function () {
        return 'cars';
    })->name('cars');

    Route::get('admin/bikes', function () {
        return 'bikes';
    })->name('bikes');
}); */

#grupo de rotas por groupe
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('users', function () {
        return 'users';
    })->name('users');

    Route::get('persons', function () {
        return 'persons';
    })->name('persons');

    Route::get('cars', function () {
        return 'cars';
    })->name('cars');

    Route::get('bikes', function () {
        return 'bikes';
    })->name('bikes');
});
