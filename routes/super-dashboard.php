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
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'OldManStuffController@restore']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'OldManStuffController@delete']);
            Route::get('/force-delete/{id}', ['as' => 'forceDelete', 'uses' => 'OldManStuffController@forceDelete']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'OldManStuffController@edit']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'OldManStuffController@update']);
            Route::get('/create', ['as' => 'create', 'uses' => 'OldManStuffController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'OldManStuffController@store']);
            Route::post('/update-view-image', ['as' => 'updateViewImage', 'uses' => 'OldManStuffController@updateViewImage']);


        });
        // end old man stuff


        // start old mam images

        Route::group(['prefix' => 'old-man-images', 'as' => 'oldManImages.'], function (){
            Route::get('/', ['as' => 'show', 'uses' => 'OldManImagesController@show']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'OldManImagesController@restore']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'OldManImagesController@delete']);
            Route::get('/force-delete/{id}', ['as' => 'forceDelete', 'uses' => 'OldManImagesController@forceDelete']);
            Route::get('/create', ['as' => 'create', 'uses' => 'OldManImagesController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'OldManImagesController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'OldManImagesController@edit']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'OldManImagesController@update']);
            Route::post('/update-view-image', ['as' => 'updateViewImage', 'uses' => 'OldManImagesController@updateViewImage']);
        });
        // end old man images


        // view
    });

    //******** start awards *********//
    Route::group(['prefix' => 'awards', 'as' => 'awards.', 'namespace' => 'Awards'], function (){
        Route::get('/', ['as' => 'show', 'uses' => 'AwardsController@showAwards']);
        Route::get('/show-seasons/{slug}', ['as' => 'showSeasons', 'uses' => 'AwardsController@showSeasons']);
        Route::get('/apps/{id}/award/{award_name}/season/{season_name}', ['as' => 'showApps', 'uses' => 'AwardsController@showApps']);

        Route::get('/create-season/{award_id}/{award_name}', ['as' => 'createSeason', 'uses' => 'AwardsController@createSeason']);
        Route::post('/store-season/{award_id}', ['as' => 'storeSeason', 'uses' => 'AwardsController@storeSeason']);
        Route::get('/edit/{award_id}/{award_name}', ['as' => 'editAward', 'uses' => 'AwardsController@editAward']);
        Route::post('/update/{award_id}', ['as' => 'updateAward', 'uses' => 'AwardsController@updateAward']);

        Route::post('/update-season/{id}', ['as' => 'updateSeason', 'uses' => 'AwardsController@updateSeason']);
        Route::get('/update-delete/{id}', ['as' => 'deleteSeason', 'uses' => 'AwardsController@deleteSeason']);


        Route::get('/show-app/{award_type}/{app_id}', ['as' => 'showApp', 'uses' => 'AwardsController@showApp']);

        // ajax
        Route::get('/nomination', ['as' => 'nomination', 'uses' => 'AwardsController@nomination']);
        Route::get('/accepted', ['as' => 'accepted', 'uses' => 'AwardsController@accepted']);
        Route::get('/show-apps-data-table/{id}', ['as' => 'showAppsDataTable', 'uses' => 'AwardsController@showAppsDataTable']);

    });
    //******** end awards *************//
    // awards

    Route::group(['prefix' => 'winner', 'as' => 'winner.', 'namespace' => 'Awards'], function (){
        Route::get('/create-winners/award/{award_slug}/season/{season_slug}', ['as' => 'createWinner', 'uses' => 'WinnersController@createWinner']);
        Route::post('/store-winner/{award_id}/{season_id}', ['as' => 'storeWinner', 'uses' => 'WinnersController@storeWinner']);

    });


});
