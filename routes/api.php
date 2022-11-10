<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("v1")->group(function () {

    Route::post("drive/login", [\App\Http\Controllers\AuthApiController::class, "login"])->name("login");
    Route::post("drive/register", [\App\Http\Controllers\AuthApiController::class, "register"])->name("register");
    Route::middleware('auth:sanctum')->group(function () {
        Route::post("logout",[\App\Http\Controllers\AuthApiController::class,"logout"])->name("logout");
        Route::post("logoutAll",[\App\Http\Controllers\AuthApiController::class,"logoutAll"])->name("logoutAll");
        Route::post("logoutAllWithoutCurrentAccess",[\App\Http\Controllers\AuthApiController::class,"logoutAllWithoutCurrentAccess"])->name("logoutAllWithoutCurrentAccess");
        Route::get("tokens",[\App\Http\Controllers\AuthApiController::class,"tokens"])->name("tokens");

        Route::resource("drive/files", \App\Http\Controllers\FileApiController::class);
        Route::resource("drive/folders", \App\Http\Controllers\FolderApiController::class);

        Route::get("drive/file_copy/{id}", [\App\Http\Controllers\MoreStatusApiController::class, 'fileCopy'])->name("drive.fileCopy");
        Route::get("drive/file_download/{id}", [\App\Http\Controllers\MoreStatusApiController::class, 'fileDownload'])->name("drive.fileDownload");
        Route::post("drive/upload_folder", [\App\Http\Controllers\MoreStatusApiController::class, 'uploadFolder'])->name("drive.uploadFolder");
        Route::get("drive/total_file_size", [\App\Http\Controllers\MoreStatusApiController::class, 'totalFileSize'])->name("drive.totalFileSize");

        /*Route::get()*/
    }
    );

});
