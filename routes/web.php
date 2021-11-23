<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\metodoController;
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


Route::get('/unauthorized', 'userController@unauthorized')->name('unauthorized');
Route::get('/users/{user}/passwordReset', ['as' => 'users.passwordReset', 'uses' => 'userController@passwordReset'])->middleware('auth');
Route::put('/password/{user}', 'userController@password')->name('users.password')->middleware('auth');

Route::group(['middleware' => 'administrador'], function () {

    //METODOS
    Route::get('/metodos', 'metodoController@index')->name('metodos.index')->middleware('auth');
    Route::get('/metodos/create/', 'metodoController@create')->middleware('auth');
    Route::get('/metodos/{metodo}/edit', ['as' => 'metodos.edit', 'uses' => 'metodoController@edit'])->middleware('auth');
    Route::post('/metodos/store', 'metodoController@store')->middleware('auth');
    Route::put('/metodos/{metodo}', 'metodoController@update')->name('metodos.update')->middleware('auth');
    Route::post('/metodos/{id}', 'metodoController@destroy')->middleware('auth');


    Route::get('/metodos/create/{id}', ['as' => 'metodos.predecesor', 'uses' => 'metodoController@predecesor'])->middleware('auth');


    //PRINCIPALES
    Route::get('/principales', 'principalController@index')->name('principales.index')->middleware('auth');
    Route::get('/principales/create', 'principalController@create')->middleware('auth');
    Route::get('/principales/{principal}/edit', ['as' => 'principales.edit', 'uses' => 'principalController@edit'])->middleware('auth');
    Route::post('/principales/store', 'principalController@store')->middleware('auth');
    Route::put('/principales/{principal}', 'principalController@update')->name('principales.update')->middleware('auth');
    Route::post('/principales/{id}', 'principalController@destroy')->middleware('auth');

    //USUARIOS
    Route::get('/users', 'userController@index')->name('users.index')->middleware('auth');
    Route::get('/users/create', 'userController@create')->middleware('auth');
    Route::get('/users/{user}/edit', ['as' => 'users.edit', 'uses' => 'userController@edit'])->middleware('auth');


    Route::post('/users/store', 'userController@store')->middleware('auth');
    Route::post('/users/{id}', 'userController@destroy')->name('users.destroy')->middleware('auth');
    
    Route::put('/users/{user}', 'userController@update')->name('users.update')->middleware('auth');
    Route::get('userChangeStatus', 'userController@userChangeStatus');

    //CATEGORIAS
    Route::get('/categorias', 'categoriaController@index')->name('categorias.index')->middleware('auth');
    Route::get('/categorias/create', 'categoriaController@create')->middleware('auth');
    Route::get('/categorias/{categoria}/edit', ['as' => 'categorias.edit', 'uses' => 'categoriaController@edit'])->middleware('auth');
    Route::post('/categorias/store', 'categoriaController@store')->middleware('auth');
    Route::post('/categorias/{id}', 'categoriaController@destroy')->middleware('auth');
    Route::put('/categorias/{categoria}', 'categoriaController@update')->name('categorias.update')->middleware('auth');

    //TECNICAS
    Route::get('/tecnicas', 'tecnicaController@index')->name('tecnicas.index')->middleware('auth');
    Route::get('/tecnicas/create', 'tecnicaController@create')->middleware('auth');
    Route::get('/tecnicas/{tecnica}/edit', ['as' => 'tecnicas.edit', 'uses' => 'tecnicaController@edit'])->middleware('auth');
    Route::post('/tecnicas/store', 'tecnicaController@store')->middleware('auth');
    Route::put('/tecnicas/{tecnica}', 'tecnicaController@update')->name('tecnicas.update')->middleware('auth');
    Route::post('/tecnicas/{id}', 'tecnicaController@destroy')->middleware('auth');
    
    //DELETE IMAGENES
    Route::post('/tecnicas-imageDelete/{tecnica}', 'tecnicaController@imageDelete')->middleware('auth');
    Route::post('/categorias-imageDelete/{categoria}', 'categoriaController@imageDelete')->middleware('auth');
    Route::post('/metodos-imageDelete/{metodo}', 'metodoController@imageDelete')->middleware('auth'); 
    Route::post('/metodosP-imageDelete/{metodoP}', 'metodoPController@imageDelete')->middleware('auth'); 
    Route::post('/productos-imageDelete/{producto}', 'productoController@imageDelete')->middleware('auth'); 

    //PRODUCTOS
    Route::get('/productos', 'productoController@index')->name('productos.index')->middleware('auth');
    Route::get('/productos/create', 'productoController@create')->middleware('auth');
    Route::get('/productos/{producto}/edit', ['as' => 'productos.edit', 'uses' => 'productoController@edit'])->middleware('auth');
    Route::post('/productos/store', 'productoController@store')->middleware('auth');
    Route::put('/productos/{producto}', 'productoController@update')->name('productos.update')->middleware('auth');
    Route::post('/productos/{id}', 'productoController@destroy')->middleware('auth');

    //METODOS PRINCIPALES
    Route::get('/metodosP', 'metodoPController@index')->name('metodosP.index')->middleware('auth');
    Route::get('/metodosP/create', 'metodoPController@create')->middleware('auth');
    Route::get('/metodosP/{metodoP}/edit', ['as' => 'metodosP.edit', 'uses' => 'metodoPController@edit'])->middleware('auth');
    Route::post('/metodosP/store', 'metodoPController@store')->middleware('auth');
    Route::put('/metodosP/{metodoP}', 'metodoPController@update')->name('metodosP.update')->middleware('auth');
    Route::post('/metodosP/{id}', 'metodoPController@destroy')->middleware('auth');

    //INSUMOS X METODOS 
    Route::get('/insumos_metodos', 'InsumoMetodoController@index')->name('insumos_metodos.index')->middleware('auth');
    Route::get('/insumos_metodos/{insumo_metodo}/edit', ['as' => 'insumos_metodos.edit', 'uses' => 'InsumoMetodoController@edit'])->middleware('auth');

    //METODOS PRINCIPALES
    Route::get('/tecnicasP', 'tecnicaPController@index')->name('tecnicasP.index')->middleware('auth');
    Route::get('/tecnicasP/create', 'tecnicaPController@create')->middleware('auth');
    Route::get('/tecnicasP/{tecnicaP}/edit', ['as' => 'tecnicasP.edit', 'uses' => 'tecnicaPController@edit'])->middleware('auth');
    Route::post('/tecnicasP/store', 'tecnicaPController@store')->middleware('auth');
    Route::put('/tecnicasP/{tecnicaP}', 'tecnicaPController@update')->name('tecnicasP.update')->middleware('auth');
    Route::post('/tecnicasP/{id}', 'tecnicaPController@destroy')->middleware('auth');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard', 'principalController@principalesAdm')->middleware('auth'); 

});
//PRINCIPALES
Route::get('/', 'principalController@principales')->middleware('auth'); 
/*
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
*/
//RUTAS DE LISTADOS - VISTA CLIENTE
Route::get('/metodos-list', 'metodoController@metodos')->middleware('auth');;
Route::get('/tecnicas-list', 'tecnicaController@tecnicas')->middleware('auth');;
Route::get('/productos-list', 'productoController@productos')->middleware('auth');;
Route::get('/categorias-list', 'categoriaController@categorias')->middleware('auth');;

//RUTAS DE BUSQUEDA DE LISTADOS - VISTA CLIENTE
Route::get('/categorias-list', 'categoriaController@search')->name('search')->middleware('auth');;
Route::get('/productos-list', 'productoController@search')->name('search')->middleware('auth');;
Route::get('/tecnicas-list', 'tecnicaController@search')->name('search')->middleware('auth');;
Route::get('/metodos-list', 'metodoController@search')->name('search')->middleware('auth');; 

Route::get('/categorias_tecnicas', 'categoriaController@searchC')->name('searchC')->middleware('auth');;


//RUTAS DE BUSQUEDA DE LISTADOS - VISTA ADMINISTRATIVA
Route::get('/ajax-search', 'DetMetodoController@ajaxSearch')->name('ajaxSearch')->middleware('auth');
Route::get('/ajax-insumo', 'metodoController@ajaxInsumo')->name('ajaxInsumo')->middleware('auth');
Route::get('/ajax-tecnica', 'metodoController@ajaxTecnica')->name('ajaxTecnica')->middleware('auth');

Route::get('metodos/{id}', [
    'as' => 'metodos',
    'uses' => 'metodoController@show'
])->middleware('auth');;
Route::get('productos/{id}', [
    'as' => 'productos',
    'uses' => 'productoController@show'
])->middleware('auth');;
Route::get('tecnicas/{id}', [
    'as' => 'tecnicas',
    'uses' => 'tecnicaController@show'
])->middleware('auth');;
Route::get('categorias/{id}', [
    'as' => 'categorias',
    'uses' => 'categoriaController@show'
])->middleware('auth');

//EXPORTAR A PDF
Route::get('/metodo/pdf/{id}', 'metodoController@createPDF')->name('metodo.pdf')->middleware('auth');;
Route::get('/metodo/pdf', 'metodoController@createPDF2')->name('metodo.pdf')->middleware('auth');;

Route::get('/tecnica/pdf/{id}', 'tecnicaController@createPDF')->name('tecnica.pdf')->middleware('auth');;
Route::get('/tecnica/pdf', 'tecnicaController@createPDF2')->name('tecnica.pdf')->middleware('auth');;

Route::get('metodos-list/{id}', [
    'as' => 'metodos-2',
    'uses' => 'metodoController@show2'
])->middleware('auth');
Route::get('tecnicas-list/{id}', [
    'as' => 'tecnica-2',
    'uses' => 'tecnicaController@show2'
])->middleware('auth');
Route::get('metodos-pre/{id}', [
    'as' => 'metodos-3',
    'uses' => 'metodoController@showpre'
])->middleware('auth');
