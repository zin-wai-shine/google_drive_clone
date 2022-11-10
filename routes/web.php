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

    Route::get('/drive/myDrive/file_copy/{id}', [\App\Http\Controllers\FunctionStatusController::class, 'fileCopy'])->name('myDrive.fileCopy');
    Route::post('/drive/myDrive/file_internal_copy', [\App\Http\Controllers\FunctionStatusController::class, 'fileInternalCopy'])->name('myDrive.fileInternalCopy');
    Route::get('/drive/myDrive/folder_copy/{id}', [\App\Http\Controllers\FunctionStatusController::class, 'folderCopy'])->name('myDrive.folderCopy');

    Route::get('/drive/myDrive/file_download/{id}', [\App\Http\Controllers\FunctionStatusController::class, 'fileDownload'])->name('myDrive.fileDownload');

    Route::post('/drive/myDrive/upload_folder', [\App\Http\Controllers\FunctionStatusController::class, 'uploadFolder'])->name('myDrive.uploadFolder');
    Route::get('drive/trash',[\App\Http\Controllers\TrashController::class, 'index'])->name('drive.trash');
    Route::get('drive/trash-folder-file/{id}',[\App\Http\Controllers\TrashController::class, 'trashFolderFile'])->name('drive.trashFolderFile');

    Route::get('drive/trash-file-delete/{id}', [\App\Http\Controllers\TrashController::class, 'fileForceDelete'])->name('drive.fileForceDelete');
    Route::get('drive/trash-file-restore/{id}', [\App\Http\Controllers\TrashController::class, 'fileForceRestore'])->name('drive.fileForceRestore');

    Route::get('drive/trash-folder-delete/{id}', [\App\Http\Controllers\TrashController::class, 'folderForceDelete'])->name('drive.folderForceDelete');
    Route::get('drive/trash-folder-restore/{id}', [\App\Http\Controllers\TrashController::class, 'folderForceRestore'])->name('drive.folderForceRestore');

});
