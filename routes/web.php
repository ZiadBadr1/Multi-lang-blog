<?php

use App\Http\Controllers\Dashboard\Modules\Setting\SettingController;
use App\Http\Controllers\Dashboard\Modules\Users\UserController;
use App\Http\Controllers\HomeController;
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
    return view('auth.login');
})->middleware('guest');

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'auth'],
function (){
   Route::get('dashboard' , [HomeController::class,'index'])->name('dashboard');

   Route::resource('users' , UserController::class);

   Route::get('setting' , [SettingController::class,'index'])->name('setting');
   Route::post('setting/update/{setting}' , [SettingController::class,'update'])->name('setting.update');
});

Auth::routes();


