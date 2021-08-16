<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([], function() {

    Route::match(['get', 'post'], '/', 'App\Http\Controllers\IndexController@execute')->name('home');
    Route::get('/page/{alias}', 'App\Http\Controllers\PageController@execute')->name('page');

});

//admin/service
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    //admin
    Route::get('/', function() {


    });

    //admin/pages
    Route::group(['prefix' => 'pages'], function() {

        ///admin/pages
        Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);

        //admin/pages/add
        Route::match(['get', 'post'], '/add',
            ['uses' => 'PagesAddController@execute', 'as' => 'pagesAdd']);
        //admin/edit/2
        Route::match(['get', 'post', 'delete'], '/edit/{page}',
            ['uses' => 'PagesEditController@execute', 'as' => 'pagesEdit']);

    });


    Route::group(['prefix' => 'portfolios'], function() {


        Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);


        Route::match(['get', 'post'], '/add',
            ['uses' => 'PortfolioAddController@execute', 'as' => 'portfolioAdd']);

        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}',
            ['uses' => 'PortfolioEditController@execute', 'as' => 'portfolioEdit']);

    });


    Route::group(['prefix' => 'services'], function() {


        Route::get('/', ['uses' => 'ServiceController@execute', 'as' => 'services']);


        Route::match(['get', 'post'], '/add',
            ['uses' => 'ServiceAddController@execute', 'as' => 'serviceAdd']);

        Route::match(['get', 'post', 'delete'], '/edit/{service}',
            ['uses' => 'ServiceEditController@execute', 'as' => 'serviceEdit']);

    });

});


require __DIR__.'/auth.php';
