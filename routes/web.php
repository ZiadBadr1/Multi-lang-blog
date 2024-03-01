<?php

use App\Http\Controllers\SettingController;
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
    return view('dashboard.index');
});

Route::group(['prefix' => 'admin','as' => 'admin.'],
function (){
   Route::get('setting' , [SettingController::class,'index'])->name('setting');
   Route::post('setting/update/{setting}' , [SettingController::class,'update'])->name('setting.update');
});
