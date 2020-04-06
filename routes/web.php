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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', 'HomeController@index')->name('home');

//Route::post('/api/auth', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/access-denied', 'User\\UserController@accessDenied')->name('home');

//Route::resource('/', 'User\\CabinetController')->names('/');

Route::get('', [
    'uses' => 'IndexController@index'
]);

//http://lab.developing.su/api/v1/hook/{-Variable.id_job-}/success

Route::group(array('prefix' => 'api'), function (){

    Route::group(array('prefix' => 'v1'), function (){

        Route::group(array('prefix' => 'hook'), function (){

            Route::group(array('prefix' => 'success'), function (){

                Route::get('', [
                    'uses' => 'Api\\ApiJobsController@hookSuccess'
                ]);

            });

        });

        Route::group(array('prefix' => 'all'), function (){

            Route::get('', [
                'uses' => 'Api\\ApiJobsController@getAll'
            ]);

        });

        Route::group(array('prefix' => 'user'), function (){

            Route::group(array('prefix' => '{id}'), function (){

                Route::get('', [
                    'uses' => 'Api\\ApiJobsController@getOnUserId'
                ]);

                Route::group(array('prefix' => 'program'), function (){

                    Route::group(array('prefix' => '{program_id}'), function (){

                        Route::get('', [
                            'uses' => 'Api\\ApiJobsController@getOnUserAndProgramId'
                        ]);

                    });

                });

            });

        });

        Route::group(array('prefix' => 'program'), function (){

            Route::group(array('prefix' => '{id}'), function (){

                Route::get('', [
                    'uses' => 'Api\\ApiJobsController@getOnProgramId'
                ]);

            });

        });

    });

});
