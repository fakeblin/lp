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

// Обработка происходит группой посредников web
Route::group(['middleware'=>'web'], function() {
    // Для показа главной страницы. post, потому что в конце форма отправки
    Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
    // Для показа READ MORE...
    Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);

    // Авторизация
    Route::auth();
});

// admin/...
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {

    // ТОЛЬКО отображение - Главная страница панели администратора
    //admin
    Route::get('/', function () {

    });

    // Манипуляция данными проекта
    // admin/pages
    Route::group(['prefix'=>'pages'], function () {

        // Список добавленных страниц
        Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);

        // Добавление новых страниц
        // admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);

        // Редактирование страницы
        // admin/edit/{num}
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses'=>'PagesEditCotroller@execute', 'as'=>'pagesEdit']);
    });

    Route::group(['prefix'=>'portoflios'], function () {

        // Список добавленных страниц
        Route::get('/', ['uses'=>'PortoflioController@execute', 'as'=>'portoflio']);

        // Добавление новых страниц
        // admin/portoflios/add
        Route::match(['get', 'post'], '/add', ['uses'=>'PortoflioAddController@execute', 'as'=>'portoflioAdd']);

        // Редактирование страницы
        // admin/portoflios/{num}
        Route::match(['get', 'post', 'delete'], '/edit/{portoflio}', ['uses'=>'PortoflioEditCotroller@execute', 'as'=>'portoflioEdit']);
    });

    Route::group(['prefix'=>'services'], function () {

        // Список добавленных страниц
        Route::get('/', ['uses'=>'ServicesController@execute', 'as'=>'services']);

        // Добавление новых страниц
        // admin/services/add
        Route::match(['get', 'post'], '/add', ['uses'=>'ServicesAddController@execute', 'as'=>'serviceAdd']);

        // Редактирование страницы
        // admin/services/{num}
        Route::match(['get', 'post', 'delete'], '/edit/{services}', ['uses'=>'ServiceEditCotroller@execute', 'as'=>'serviceEdit']);
    });
});
