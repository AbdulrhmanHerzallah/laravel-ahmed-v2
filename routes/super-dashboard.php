<?php

use Illuminate\Support\Facades\Route;


Route::group(['as' => 'super.auth.', 'namespace' => 'SuperDashboard\Users'], function (){
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@indexLogin']);
});


Route::group(['as' => 'super-dashboard.', 'namespace' => 'SuperDashboard', 'middleware' => ['auth', 'is_admin']], function (){
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        Route::group(['prefix' => 'permissions', 'as' => 'UsersPermission.', 'namespace' => 'Users', 'middleware' => 'role:permissions|superAdmin'], function (){
            Route::get('/show', ['as' => 'show', 'uses' => 'PermissionsController@show']);
            Route::post('/store', ['as' => 'store', 'uses' => 'PermissionsController@store']);
    });


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
            Route::get('/', ['as' => 'show', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenEditVideo|yaseenDeleteVideo|yaseenUpdateVideo|yaseenCreateVideo', 'uses' => 'OldManMemoryVideosController@show']);
            Route::post('/store', ['as' => 'store', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenCreateVideo', 'uses' => 'OldManMemoryVideosController@store']);

            Route::get('/create', ['as' => 'create', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenCreateVideo', 'uses' => 'OldManMemoryVideosController@create']);

            Route::post('/update-view-image', ['as' => 'updateViewImage', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenUpdateVideo', 'uses' => 'OldManMemoryVideosController@updateViewImage']);

            Route::get('/edit/{id}', ['as' => 'edit', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenUpdateVideo|yaseenEditVideo', 'uses' => 'OldManMemoryVideosController@edit']);

            Route::post('/update/{id}', ['as' => 'update', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenUpdateVideo|yaseenEditVideo', 'uses' => 'OldManMemoryVideosController@update']);

            Route::get('/delete/{id}', ['as' => 'delete', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenDeleteVideo', 'uses' => 'OldManMemoryVideosController@delete']);

            Route::get('/restore/{id}', ['as' => 'restore', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenDeleteVideo', 'uses' => 'OldManMemoryVideosController@restore']);
            Route::get('/force-delete/{id}', ['as' => 'forceDelete', 'middleware' => 'ability:superAdmin|yaseenVideos|yaseenDeleteVideo', 'uses' => 'OldManMemoryVideosController@forceDelete']);
        });
        // end old man memory videos

        // start old man stuff


        Route::group(['prefix' => 'old-man-stuff', 'as' => 'oldManStuff.'], function (){
            Route::get('/', ['as' => 'show', 'middleware' => 'ability:superAdmin|yaseenStuff|yaseenEditStuff|yaseenDeleteStuff|yaseenUpdateStuff|yaseenCreateStuff', 'uses' => 'OldManStuffController@show']);

            Route::get('/restore/{id}', ['as' => 'restore', 'middleware' => 'ability:superAdmin|yaseenDeleteStuff', 'uses' => 'OldManStuffController@restore']);

            Route::get('/delete/{id}', ['as' => 'delete', 'middleware' => 'ability:superAdmin|yaseenStuff|yaseenDeleteStuff', 'uses' => 'OldManStuffController@delete']);

            Route::get('/force-delete/{id}', ['as' => 'forceDelete', 'middleware' => 'ability:superAdmin|yaseenDeleteStuff', 'uses' => 'OldManStuffController@forceDelete']);

            Route::get('/edit/{id}', ['as' => 'edit', 'middleware' => 'ability:superAdmin|yaseenUpdateStuff|yaseenEditStuff', 'uses' => 'OldManStuffController@edit']);

            Route::post('/update/{id}', ['as' => 'update', 'middleware' => 'ability:superAdmin|yaseenUpdateStuff', 'uses' => 'OldManStuffController@update']);

            Route::get('/create', ['as' => 'create', 'middleware' => 'ability:superAdmin|yaseenCreateStuff', 'uses' => 'OldManStuffController@create']);

            Route::post('/store', ['as' => 'store', 'middleware' => 'ability:superAdmin|yaseenCreateStuff', 'uses' =>  'OldManStuffController@store']);

            Route::post('/update-view-image', ['as' => 'updateViewImage', 'middleware' => 'ability:superAdmin|yaseenUpdateStuff', 'uses' => 'OldManStuffController@updateViewImage']);


        });
        // end old man stuff


        // start old mam images




        Route::group(['prefix' => 'old-man-images', 'as' => 'oldManImages.'], function (){
            Route::get('/', ['as' => 'show', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenEditImage|yaseenDeleteImage|yaseenUpdateImage|yaseenCreateImage', 'uses' => 'OldManImagesController@show']);

            Route::get('/restore/{id}', ['as' => 'restore', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenDeleteImage', 'uses' => 'OldManImagesController@restore']);

            Route::get('/delete/{id}', ['as' => 'delete', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenDeleteImage', 'uses' => 'OldManImagesController@delete']);

            Route::get('/force-delete/{id}', ['as' => 'forceDelete', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenDeleteImage', 'uses' => 'OldManImagesController@forceDelete']);

            Route::get('/create', ['as' => 'create', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenCreateImage', 'uses' => 'OldManImagesController@create']);

            Route::post('/store', ['as' => 'store', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenCreateImage', 'uses' => 'OldManImagesController@store']);

            Route::get('/edit/{id}', ['as' => 'edit', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenEditImage|yaseenUpdateImage', 'uses' => 'OldManImagesController@edit']);

            Route::post('/update/{id}', ['as' => 'update', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenEditImage|yaseenUpdateImage', 'uses' => 'OldManImagesController@update']);

            Route::post('/update-view-image', ['as' => 'updateViewImage', 'middleware' => 'ability:superAdmin|yaseenImages|yaseenEditImage|yaseenUpdateImage', 'uses' => 'OldManImagesController@updateViewImage']);
        });
        // end old man images


        // last news
        Route::group(['prefix' => 'last-news', 'as' => 'lastNews.', 'middleware' => 'ability:superAdmin|lastNews|mediaCenter'], function (){
            Route::get('/show',   ['as' => 'show', 'uses' => 'LastNewsController@show']);
            Route::get('/create', ['as' => 'create', 'uses' => 'LastNewsController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'LastNewsController@store']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'LastNewsController@update']);

            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'LastNewsController@delete']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'LastNewsController@restore']);
            Route::get('/forceDelete/{id}', ['as' => 'forceDelete', 'uses' => 'LastNewsController@forceDelete']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'LastNewsController@edit']);
        });

        // end news

        // start ads

        Route::group(['prefix' => 'last-ads', 'as' => 'lastAds.'], function (){
            Route::get('/show',   ['as' => 'show', 'uses' => 'LastAdsController@show']);
            Route::get('/create', ['as' => 'create', 'uses' => 'LastAdsController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'LastAdsController@store']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'LastAdsController@update']);

            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'LastAdsController@delete']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'LastAdsController@restore']);
            Route::get('/forceDelete/{id}', ['as' => 'forceDelete', 'uses' => 'LastAdsController@forceDelete']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'LastAdsController@edit']);
        });
        // end ads

        Route::group(['prefix' => 'contact-us', 'as' => 'contactUs.', 'middleware' => 'ability:superAdmin|contactUs|mediaCenter'], function (){
            Route::get('/show',   ['as' => 'show', 'uses' => 'ContactUsController@show']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'ContactUsController@delete']);
        });

        Route::group(['prefix' => 'logo-foundation', 'as' => 'logoFoundation.', 'middleware' => 'ability:superAdmin|logoFoundations|mediaCenter'], function () {
            Route::get('/show', ['as' => 'show', 'uses' => 'LogoFoundationController@show']);
            Route::get('/edit/{key}', ['as' => 'edit', 'uses' => 'LogoFoundationController@edit']);
            Route::post('/update/{key}', ['as' => 'update', 'uses' => 'LogoFoundationController@update']);
        });


        Route::group(['prefix' => 'they-said-about-us', 'as' => 'theySaidAboutUs.', 'middleware' => 'ability:superAdmin|tellAboutUs|mediaCenter'], function (){
            Route::get('/show', ['as' => 'show', 'uses' => 'TheySaidAboutUs@show']);
            Route::get('/create', ['as' => 'create', 'uses' => 'TheySaidAboutUs@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'TheySaidAboutUs@store']);

            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'TheySaidAboutUs@edit']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'TheySaidAboutUs@update']);


            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'TheySaidAboutUs@delete']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'TheySaidAboutUs@restore']);
            Route::get('/forceDelete/{id}', ['as' => 'forceDelete', 'uses' => 'TheySaidAboutUs@forceDelete']);
        });

        Route::group(['prefix' => 'images-show', 'as' => 'imagesShow.', 'middleware' => 'ability:superAdmin|imagesShow|mediaCenter'], function (){
            Route::get('/show', ['as' => 'show', 'uses' => 'ImagesShowController@show']);
            Route::get('/create', ['as' => 'create', 'uses' => 'ImagesShowController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'ImagesShowController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'ImagesShowController@edit']);

            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'ImagesShowController@restore']);
            Route::get('/forceDelete/{id}', ['as' => 'forceDelete', 'uses' => 'ImagesShowController@forceDelete']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'ImagesShowController@delete']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'ImagesShowController@update']);
        });

        Route::group(['prefix' => 'videos-show', 'as' => 'videosShow.', 'middleware' => 'ability:superAdmin|videosShow|mediaCenter'], function (){
            Route::get('/show', ['as' => 'show', 'uses' => 'VideosShowController@show']);
            Route::get('/create', ['as' => 'create', 'uses' => 'VideosShowController@create']);
            Route::post('/store', ['as' => 'store', 'uses' => 'VideosShowController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'VideosShowController@edit']);

            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'VideosShowController@restore']);
            Route::get('/forceDelete/{id}', ['as' => 'forceDelete', 'uses' => 'VideosShowController@forceDelete']);
            Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'VideosShowController@delete']);
            Route::post('/update/{id}', ['as' => 'update', 'uses' => 'VideosShowController@update']);
        });


        // end view
    });

    //******** start awards *********//
    Route::group(['prefix' => 'awards', 'as' => 'awards.', 'namespace' => 'Awards', 'middleware' => ['ability:superAdmin|award|free|poet|writer|personality']], function (){
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

    Route::group(['prefix' => 'winner', 'as' => 'winner.', 'namespace' => 'Awards', 'middleware' => ['ability:superAdmin|award|free|poet|writer|personality']], function (){
        Route::get('/create-winners/award/{award_slug}/season/{season_slug}', ['as' => 'createWinner', 'uses' => 'WinnersController@createWinner']);
        Route::get('/show-winners/{award_slug}/{season_slug}', ['as' => 'showWinners', 'uses' => 'WinnersController@showWinners']);
        Route::post('/store-winner/{award_id}/{season_id}', ['as' => 'storeWinner', 'uses' => 'WinnersController@storeWinner']);
    });


});
