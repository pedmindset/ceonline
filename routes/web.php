<?php

use App\Models\Service;
use Illuminate\Http\Request;
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

Auth::routes(['verify' => true]);

Route::get('/', function (Request $request) {
    if($request->user()){
        return redirect('home');
    }
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/videos', function () {
        return view('users.liveservice');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/attendance_count', 'AttendanceController@store');

    Route::post('/comments', 'ServiceController@post_comment');

    Route::get('/videos', 'ServiceController@index');

    Route::get('/videos/{id}', 'ServiceController@show');

    Route::post('/payments', 'PaymentController@give');

    Route::get('/givings', 'PaymentController@index');


    Route::get('views', function(){
        $service = Service::latest()->first();

        $service = views($service)->count();

        return $service;
    });

});


