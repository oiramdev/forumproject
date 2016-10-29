<?php

use App\Models\SubCategoria;
use App\Models\Categoria;
use App\Models\Topico;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/', 'Controller\FrontController@index');





Route::get('/profile', 'Controller\UserController@profile');
Route::post('/profile', 'Controller\UserController@updateAvatar');
Route::get('profile/notifications', 'Controller\UserController@showNotifications');
Route::put('/profile/updateProfile', 'Controller\UserController@updateProfile');


Route::get('/backoffice','Controller\BackofficeController@index');

Route::resource('/topic', 'Controller\TopicoController');

Route::get('topic/categorias/{id}', 'Controller\TopicoController@getSubcategorias');

Route::get('categoria/{id}', 'Controller\FrontController@showCategoria');

Route::get('subcategoria/{id}', 'Controller\FrontController@showSubCategoria');

Route::get('/search', 'Controller\FrontController@searchTopics');


Route::resource('/backoffice/categorias', 'Controller\CategoriaController');

Route::resource('/backoffice/subcategorias', 'Controller\SubcategoriaController');

Route::get('/backoffice/users', 'Controller\BackofficeController@allUsers');

Route::get('/backoffice/updateUserStatus', 'Controller\BackofficeController@updateUserStatus');

Route::get('/backoffice/updateTopicStatus', 'Controller\BackofficeController@updateTopicStatus');

Route::get('/backoffice/topics', 'Controller\BackofficeController@allTopics');

Route::resource('/message', 'Controller\MessageController');

