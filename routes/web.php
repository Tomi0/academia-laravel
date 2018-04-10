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

// Rutas de páginas estáticas
Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('/contact', 'PagesController@contact')->name('pages.contact');
Route::get('/about', 'PagesController@about')->name('pages.about');


// Rutas de los cursos
Route::get('/course', 'CoursesController@all')->name('course');
Route::get('/course/{course}', 'CoursesController@show')->name('course.show');


// Rutas para las asignaturas
Route::group([
    'middleware' => ['auth', 'role:alumno|profesor|admin']],
    function () {
        Route::get('/subject/{subject}', 'SubjectController@show')->name('subject');
        Route::post('/subject/{subject}/matricular', 'SubjectController@matricular')->name('subject.matricular');
    });

// Rutas para editar asignaturas y agregar o eliminar documentos a las asignaturas
Route::group([
    'middleware' => ['auth', 'role:profesor|admin']],
    function () {
        Route::get('/subject/{subject}/edit', 'SubjectController@edit')->name('subject.edit');
    });


// Rutas para los documentos
Route::group([
    'middleware' => ['auth', 'role:alumno|profesor|admin']],
    function () {
        Route::get('/document/{document}', 'DocumentsController@show')->name('document.show');
        Route::post('/document/{subject}/store', 'DocumentsController@store')->name('document.store');
        Route::delete('/document/{document}', 'DocumentsController@destroy')->name('document.delete');
    });

// RUTAS DE ADMINISTRACIÓN
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'role:admin']],
    function () {
        Route::get('/', 'AdminController@index')->name('dashboard');

        // RUTAS DE USUARIOS
        Route::get('/user', 'UsersController@index')->name('admin.user');
        Route::get('/user/create', 'UsersController@create')->name('admin.user.create');
        Route::post('/user', 'UsersController@store')->name('admin.user.store');
        Route::get('/user/{user}', 'UsersController@edit')->name('admin.user.edit');
        Route::put('/user/{user}', 'UsersController@update')->name('admin.user.update');
        Route::delete('/user/{user}', 'UsersController@destroy')->name('admin.user.destroy');

        // Matriculas de usuarios
        Route::get('/matricula', 'UsersController@matricula')->name('admin.matricula');

        // RUTAS DE ASIGNATURAS
        Route::get('/subject', 'SubjectsController@index')->name('admin.subject');
        Route::get('/subject/create', 'SubjectsController@create')->name('admin.subject.create');
        Route::get('/subject/{subject}/edit', 'SubjectsController@edit')->name('admin.subject.edit');
        Route::post('/subject', 'SubjectsController@store')->name('admin.subject.store');
        Route::put('/subject/{subject}', 'SubjectsController@update')->name('admin.subject.update');
        Route::delete('/subject/{subject}', 'SubjectsController@destroy')->name('admin.subject.destroy');

        // RUTAS DE ADMINISTRACIÓN DE DOCUMENTOS
        Route::get('/document', 'DocumentsController@index')->name('admin.document');
        Route::post('/document', 'DocumentsController@store')->name('admin.document.store');
    });

Auth::routes();
