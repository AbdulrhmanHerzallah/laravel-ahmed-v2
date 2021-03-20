<?php


use Illuminate\Support\Facades\Route;


Route::get('/', ['as' => 'index', 'uses' => 'UserDashboard\IndexController@index']);
