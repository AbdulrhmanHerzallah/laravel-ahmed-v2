<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'super-dashboard.', 'namespace' => 'SuperDashboard'], function (){

    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);


    Route::group(['namespace' => 'View'], function (){

        // slider

        Route::group(['prefix' => 'slider', 'as' => 'slider.'], function (){
            Route::get('/', ['as' => 'show', 'uses' => 'SliderController@show']);
            Route::get('/create-slider', ['as' => 'create', 'uses' => 'SliderController@create']);
            Route::get('/edit-slider/{id}', ['as' => 'edit', 'uses' => 'SliderController@edit']);
            Route::post('/store', ['as' => 'store', 'uses' => 'SliderController@store']);
            Route::patch('/update/{id}', ['as' => 'update', 'uses' => 'SliderController@update']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'SliderController@delete']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'SliderController@restore']);
            Route::get('/force-delete/{id}', ['as' => 'forceDelete', 'uses' => 'SliderController@forceDelete']);

        });

        //*****************************************************************

        // about ahmed

        Route::group(['prefix' => 'about-ahmed', 'as' => 'aboutAhmed.'], function () {
            Route::get('/', ['as' => 'show', 'uses' => 'AboutAhmedController@show']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'AboutAhmedController@edit']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'AboutAhmedController@update']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'AboutAhmedController@delete']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'AboutAhmedController@restore']);
        });


        // about foundation
        Route::group(['prefix' => 'about-foundation', 'as' => 'aboutFoundation.'], function () {
            Route::get('/', ['as' => 'show', 'uses' => 'AboutFoundationController@show']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'AboutFoundationController@edit']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'AboutFoundationController@update']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'AboutFoundationController@delete']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'AboutFoundationController@restore']);
        });
        // end about ahmed

        // start old man memory videos
        Route::group(['prefix' => 'old-man-memory-videos', 'as' => 'oldManMemoryVideos.'], function () {
            Route::get('/', ['as' => 'show', 'uses' => 'OldManMemoryVideosController@show']);
            Route::post('/store', ['as' => 'store', 'uses' => 'OldManMemoryVideosController@store']);
            Route::get('/create', ['as' => 'create', 'uses' => 'OldManMemoryVideosController@create']);
            Route::post('/update-view-image', ['as' => 'updateViewImage', 'uses' => 'OldManMemoryVideosController@updateViewImage']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'OldManMemoryVideosController@edit']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'OldManMemoryVideosController@update']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'OldManMemoryVideosController@delete']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'OldManMemoryVideosController@restore']);
            Route::get('/force-delete/{id}', ['as' => 'forceDelete', 'uses' => 'OldManMemoryVideosController@forceDelete']);
        });
        // end old man memory videos

        // start old man stuff
        Route::group(['prefix' => 'old-man-stuff', 'as' => 'oldManStuff.'], function (){
            Route::get('/', ['as' => 'show', 'uses' => 'OldManStuffController@show']);
            Route::get('/create', ['as' => 'create', 'uses' => 'OldManStuffController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'OldManStuffController@store']);
        });
        // end old man stuff



    });

});
