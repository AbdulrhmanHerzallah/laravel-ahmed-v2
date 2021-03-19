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

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/test', function (){
    $role = Role::where('name', 'award')->first() ?? null;
    dd($role->permissions);
});
