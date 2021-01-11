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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hr/dashboard','HomeController@index');

Route::group(['middleware'=>'auth'],function(){
    Route::prefix('users')->group(function(){
        Route::get('/view',[
            'uses' => 'Backend\UserController@viewUser',
            'as' =>'users.view'
        ]);
        Route::get('/add',[
            'uses' => 'Backend\UserController@addUser',
            'as' =>'users.add'
        ]);
        Route::post('/save',[
            'uses' => 'Backend\UserController@saveUser',
            'as' =>'users.save'
        ]);
        Route::get('/edit/{id}',[
            'uses' => 'Backend\UserController@editUser',
            'as' =>'users.edit'
        ]);
        Route::post('/update/{id}',[
            'uses' => 'Backend\UserController@updateUser',
            'as'   => 'users.update'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'Backend\UserController@deleteUser',
            'as'   => 'users.delete'
        ]);

    });
    Route::prefix('profiles')->group(function(){
        Route::get('/view',[
            'uses' => 'Backend\ProfileController@viewProfile',
            'as' =>'profiles.view'
        ]);
        Route::post('/save',[
            'uses' => 'Backend\ProfileController@saveProfile',
            'as' =>'profiles.save'
        ]);
        Route::get('/edit/{id}',[
            'uses' => 'Backend\ProfileController@editProfile',
            'as' =>'profiles.edit'
        ]);
        Route::post('/update/{id}',[
            'uses' => 'Backend\ProfileController@updateProfile',
            'as'   => 'profiles.update'
        ]);
        Route::get('/password/view',[
            'uses' => 'Backend\ProfileController@passwordView',
            'as'   => 'profiles.password.view'
        ]);
        Route::post('/password/update',[
            'uses' => 'Backend\ProfileController@passwordUpdate',
            'as'   => 'profiles.password.update'
        ]);
    });

    Route::prefix('sliders')->group(function(){
        Route::get('/view',[
            'uses' => 'Backend\UserController@viewSlider',
            'as'   => 'sliders.view'
        ]);
        Route::get('/add',[
            'uses' => 'Backend\UserController@addSlider',
            'as'   => 'sliders.add'
        ]);
        Route::post('/save',[
            'uses' => 'Backend\UserController@saveSlider',
            'as'   => 'sliders.save'
        ]);
        Route::get('/edit/{id}',[
            'uses' => 'Backend\UserController@editSlider',
            'as'   => 'sliders.edit'
        ]);
        Route::post('/update/{id}',[
            'uses' => 'Backend\UserController@updateSlider',
            'as'   => 'sliders.update'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'Backend\UserController@deleteSlider',
            'as'   => 'sliders.delete'
        ]);
    });
});





Auth::routes();
Route::get('/home', 'HomeController@index')->name('/home');




