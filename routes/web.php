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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::middleware('auth')->group(function (){
    Route::get('/', [App\Http\Controllers\DriveController::class, 'index'])->name('drive.Drive');
    Route::resource('/drive/myDrive', App\Http\Controllers\DriveController::class);
    Route::resource('/drive/folder', \App\Http\Controllers\FolderController::class);

    Route::get('/drive/myDrive/{id}', [\App\Http\Controllers\FunctionStatusController::class, 'copy'])->name('myDrive.copy')
});
