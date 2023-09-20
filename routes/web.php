<?php

use App\Http\Controllers\movie\MovieCreateController;
use App\Http\Controllers\movie\MovieDeleteController;
use App\Http\Controllers\movie\MovieEditController;
use App\Http\Controllers\movie\MovieIndexController;
use App\Http\Controllers\movie\MovieStoreController;
use App\Http\Controllers\movie\MovieUpdateController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserLogoutController;
use App\Http\Controllers\UserRegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function(){
    return "<h1>A movie crititc</h1>";
})->name('index');

Route::prefix('movies')->group(function (){

    // Index
    Route::get('/', MovieIndexController::class)->name('movie.index');

    // Create
    Route::get('/create', MovieCreateController::class)->name('movie.create');
    Route::post('/create', MovieStoreController::class)->name('movie.store');


    // Edit
    Route::get('/{movie}', MovieEditController::class)->name('movie.edit');
    Route::put('/{movie}', MovieUpdateController::class)->name('movie.update');

    // delete
    Route::delete('/{movie}', MovieDeleteController::class)->name('movie.destroy');
});

Route::name('user.')->group(function (){

    Route::view('/private', 'welcome')->middleware('auth')->name('private');

    Route::get('/login', function (){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', UserLoginController::class);
    Route::get('/logout', UserLogoutController::class);

    Route::get('/registration', function (){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name("registration");

    Route::post('/registration', UserRegistrationController::class);

});
