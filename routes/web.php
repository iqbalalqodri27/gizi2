<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\ChildController; 
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\ChartJSController;

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

Route::get('/', function () {
    return view('index');
});

// Route::get('/login', function () {
//     return view('layouts.login');
// })->name('login');

Route::get('/register', function () {
    return view('layouts.login');
});

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
            return view('layouts.dashboard');
    });

    Route::resource('dataibu', MotherController::class);
    
    Route::resource('dataanak', ChildController::class);

    Route::resource('dataposyandu', PosyanduController::class);
    
    Route::get('chart', [ChartJSController::class, 'index']);
    Route::post('chart', [ChartJSController::class, 'index']);

});
