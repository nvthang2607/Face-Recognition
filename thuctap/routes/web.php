<?php
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    return view('index');
});
Route::get('/admin', function () {
    return view('admin');
});
route::post('test2',[
    'as'=>'insert',
    'uses'=>'App\Http\Controllers\Controller@get_insert'
]);
route::get('test3',[
    'as'=>'select',
    'uses'=>'App\Http\Controllers\Controller@get_select'
]);
Route::get('/test', function () {
    return view('test');
});
// Route::post('/test2', function () {
//     return view('test');
// });