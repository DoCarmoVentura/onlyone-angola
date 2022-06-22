<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('login');
})->name("principal");

Route::get('/admin/index', function () {
    // echo 'Raul'; exit;
    if (Auth::check()) {

        return view('admin.index');
    } else {
        return Redirect::to('onlyone-angola/login');
    }
})->name("principal");

Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to('onlyone-angola/login');
});
Route::get('/onlyone-angola/login', function () {
    if (Auth::check()) {
        return redirect('home');
    }

    return view('sitelogin');
});


Route::get('/', 'App\Http\Controllers\PrincipalController@inicio')->name('site.principal');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@SobreNos')->name('site.sobrenos');

Route::get('/servicos', 'App\Http\Controllers\ServicoController@Servicos')->name('site.servicos');

//Route::get('/produtos', 'App\Http\Controllers\ProdutoController@Produtos')->name('site.produtos');

Route::get('/contactos', 'App\Http\Controllers\ContactoController@Contactos')->name('site.contactos');

Route::get('/login', 'App\Http\Controllers\LoginController@Login')->name('site.login');

Route::resource('produtos', App\Http\Controllers\ProdutoController::class);

Route::get('produtos.produtos', 'App\Http\Controllers\ProdutoController@produtos')->name('produtos.produtos');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
