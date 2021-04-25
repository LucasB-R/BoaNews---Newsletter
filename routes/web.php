<?php

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

Route::middleware(['guest'])->group(function () {
    
    Route::get('/cadastro', function () {
        return view('Auth.cadastro');
    })
    ->name('Cadastro');

    Route::post('/cadastro', 'AuthController@Cadastro');

//-------------------------------------------------------------------------//

    Route::get('/', function () {
        return redirect()->Route('Login');
    });

    Route::get('/login', function () {
        return view('Auth.login');
    })
    ->name('Login');

    Route::post('/login', 'AuthController@Login');

});


Route::middleware(['auth'])->group(function () {
   
    Route::get('/sair', function () {
        Auth::logout();
        return redirect()->Route('Login');
    })
    ->name('Logout');


    Route::get('/dashboard', 'NewsController@MinhasNews')
    ->name('Dashboard');

//-------------------------------------------------------------------------//

    Route::prefix('noticia')->group(function () {
        
        Route::get('/criar', function () {
            return view('News.nova');
        })
        ->name('Nova notícia');

        Route::post('/criar', 'NewsController@Nova');

        Route::get('/editar/{id}', 'NewsController@Editar')
        ->name('Editar notícia');

        Route::post('/editar/{id}', 'NewsController@Editando');

        Route::get('/deletar/{id}', 'NewsController@Deletar')
        ->name('Deletar notícia');

        Route::get('/enviar/{id}', 'EmailController@enviarIndex')
        ->name('Enviar notícia 1');

        Route::get('/envio/api/{id}/{email}', 'EmailController@enviar')
        ->name('Enviar notícia 2');

        Route::get('/{id}/emails', 'EmailController@Recebidos')
        ->name('Notícias Recebidas');

    });

//-------------------------------------------------------------------------//

    Route::prefix('emails')->group(function () {

    Route::get('/meusemails', 'EmailController@MeusEmails')
    ->name('E-mails');

    Route::get('/deletar/{id}', 'EmailController@DeletarEmail')
    ->name('Deletar Email');

        });


});


Route::middleware(['admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/resumo', 'AdminController@TodasNews')
        ->name('Resumo');
    
    Route::prefix('noticia')->group(function () {
    
            Route::get('/editar/{id}', 'AdminController@Editar')
            ->name('Gerenciamento - Editar notícia');
    
            Route::post('/editar/{id}', 'AdminController@Editando');
    
            Route::get('/deletar/{id}', 'AdminController@Deletar')
            ->name('Gerenciamento - Deletar notícia');
    
            Route::get('/{id}/emails', 'AdminController@Recebidos')
            ->name('Gerenciamento - Notícias Recebidas');
    
    });
  });
});