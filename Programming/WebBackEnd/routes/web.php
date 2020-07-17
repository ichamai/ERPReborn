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

//---[ Default ERP Reborn (Front End & Back End) ]---(START)------

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('test', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@test');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('test2', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@test2');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('showLogOutput', 'get', 'zhtHelperLogOutputShow', 'web');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('showLogError', 'get', 'zhtHelperLogErrorShow', 'web');

//Route::get('showLogOutput', function () {
//    return view('zhtHelperLogOutputShow');
//    })->middleware('web');
//Route::get('showLogError', function () {
//    return view('zhtHelperLogErrorShow');
//    })->middleware('web');
//Route::get('test', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@init');

//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----
