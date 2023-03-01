<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/view', function () {
        return view('view');
    })->name('view');

    Route::get('/connect', function(){ return view( 'connect' ); })->name('connect');
});

Route::post('/keys', function () {

    // TODO save key_id, user_id, consumer_key, consumer_secret, key_permissions

    $data = request()->toArray();
    $site['user_id'] = auth()->user()->getAuthIdentifier();


    return view('welcome');
});
