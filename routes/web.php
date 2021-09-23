<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\metodoController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/unauthorized', 'userController@unauthorized')->name('unauthorized');

Route::group(['middleware' => 'administrador'], function () {
    Route::get('/metodos', 'metodoController@index')->name('metodos.index')->middleware('auth');
    Route::get('/metodos/create', 'metodoController@create')->middleware('auth');
    Route::get('/metodos/{metodo}/edit', ['as' => 'metodos.edit', 'uses' => 'metodoController@edit'])->middleware('auth');
    Route::post('/metodos/store', 'metodoController@store')->middleware('auth');
    Route::delete('/metodos/destroy', 'metodoController@destroy')->middleware('auth');
    Route::put('/metodos/{metodo}', 'metodoController@update')->name('metodos.update')->middleware('auth');

    /*Route::get('/metodos', 'metodoController@index')->name('metodos.index')->middleware('auth');
Route::get('/metodos/create', 'metodoController@create')->middleware('auth');
Route::get('/metodos/{metodo}/edit', [ 'as' => 'metodos.edit', 'uses' => 'metodoController@edit'])->middleware('auth');
Route::post('/metodos/store', 'metodoController@store')->middleware('auth');
Route::delete('/metodos/destroy', 'metodoController@destroy')->middleware('auth');
Route::put('/metodos/{metodo}', 'metodoController@update')->name('metodos.update')->middleware('auth');
Route::get('/unauthorized', 'userController@unauthorized')->name('unauthorized')->middleware('auth');*/
    //METODOS

    //CATEGORIAS
    Route::get('/categorias', 'categoriaController@index')->name('categorias.index')->middleware('auth');
    Route::get('/categorias/create', 'categoriaController@create')->middleware('auth');
    Route::get('/categorias/edit', 'categoriaController@edit')->middleware('auth');
    Route::post('/categorias/store', 'categoriaController@store')->middleware('auth');
    Route::delete('/categorias/destroy', 'categoriaController@destroy')->middleware('auth');
    Route::put('/categorias/update', 'categoriaController@update')->middleware('auth');

    //TECNICAS
    Route::get('/tecnicas', 'tecnicaController@index')->name('tecnicas.index')->middleware('auth');
    Route::get('/tecnicas/create', 'tecnicaController@create')->middleware('auth');
    Route::get('/tecnicas/{tecnica}/edit', ['as' => 'tecnicas.edit', 'uses' => 'tecnicaController@edit'])->middleware('auth');
    Route::post('/tecnicas/store', 'tecnicaController@store')->middleware('auth');
    Route::delete('/tecnicas/destroy', 'tecnicaController@destroy')->middleware('auth');
    Route::put('/tecnicas/{tecnica}', 'tecnicaController@update')->name('tecnicas.update')->middleware('auth');

    //PRODUCTOS
    Route::get('/productos', 'productoController@index')->name('productos.index')->middleware('auth');
    Route::get('/productos/create', 'productoController@create')->middleware('auth');
    Route::get('/productos/{producto}/edit', ['as' => 'productos.edit', 'uses' => 'productoController@edit'])->middleware('auth');
    Route::post('/productos/store', 'productoController@store')->middleware('auth');
    Route::delete('/productos/destroy', 'productoController@destroy')->middleware('auth');
    Route::put('/productos/{producto}', 'productoController@update')->name('productos.update')->middleware('auth');

    //METODOS PRINCIPALES
    Route::get('/metodosP', 'metodoPController@index')->name('metodosP.index')->middleware('auth');
    Route::get('/metodosP/create', 'metodoPController@create')->middleware('auth');
    Route::get('/metodosP/edit', 'metodoPController@edit')->middleware('auth');
    Route::post('/metodosP/store', 'metodoPController@store')->middleware('auth');
    Route::delete('/metodosP/destroy', 'metodoPController@destroy')->middleware('auth');
    Route::put('/metodosP/update', 'metodoPController@update')->middleware('auth');

    //METODOS PRINCIPALES
    Route::get('/tecnicasP', 'tecnicaPController@index')->name('tecnicasP.index')->middleware('auth');
    Route::get('/tecnicasP/create', 'tecnicaPController@create')->middleware('auth');
    Route::get('/tecnicasP/edit', 'tecnicaPController@edit')->middleware('auth');
    Route::post('/tecnicasP/store', 'tecnicaPController@store')->middleware('auth');
    Route::delete('/tecnicasP/destroy', 'tecnicaPController@destroy')->middleware('auth');
    Route::put('/tecnicasP/update', 'tecnicaPController@update')->middleware('auth');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//RUTAS DE LISTADOS - VISTA CLIENTE
Route::get('/metodos-list', 'metodoController@metodos');
Route::get('/tecnicas-list', 'tecnicaController@tecnicas');
Route::get('/productos-list', 'productoController@productos');
Route::get('/categorias-list', 'categoriaController@categorias');

//RUTAS DE BUSQUEDA DE LISTADOS - VISTA CLIENTE
Route::get('/categorias-list', 'categoriaController@search')->name('search');
Route::get('/productos-list', 'productoController@search')->name('search');
Route::get('/tecnicas-list', 'tecnicaController@search')->name('search');
Route::get('/metodos-list', 'metodoController@search')->name('search'); 

Route::get('/categorias_tecnicas', 'categoriaController@searchC')->name('searchC');


//RUTAS DE BUSQUEDA DE LISTADOS - VISTA ADMINISTRATIVA
Route::get('/ajax-search', 'DetMetodoController@ajaxSearch')->name('ajaxSearch')->middleware('auth');;
Route::get('/ajax-insumo', 'metodoController@ajaxInsumo')->name('ajaxInsumo')->middleware('auth');;
Route::get('/ajax-tecnica', 'metodoController@ajaxTecnica')->name('ajaxTecnica')->middleware('auth');;

Route::get('metodos/{id}', [
    'as' => 'metodos',
    'uses' => 'metodoController@show'
]);
Route::get('productos/{id}', [
    'as' => 'productos',
    'uses' => 'productoController@show'
]);
Route::get('tecnicas/{id}', [
    'as' => 'tecnicas',
    'uses' => 'tecnicaController@show'
]);
Route::get('categorias/{id}', [
    'as' => 'categorias',
    'uses' => 'categoriaController@show'
]);

//EXPORTAR A PDF
Route::get('/metodo/pdf', [metodoController::class, 'createPDF'])->name('metodo.pdf');
