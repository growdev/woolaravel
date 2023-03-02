<?php

use App\Http\Controllers\Connect;
use App\Models\Site;
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
    Route::get('/connect', function() {
        return view( 'connect' );
    })->name('connect');
    Route::get('/view/{site}', function (Site $site) {
        return view('view', ['site'=>$site]);
    })->name('view');
});

Route::post('/keys/{site:token}', [Connect::class, 'store'])->name('store');
