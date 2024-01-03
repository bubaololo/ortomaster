<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('welcome');
});

//serve patients photos from sftp storage
if (env('FILESYSTEM_DISK') == 'sftp') {
    Route::get('/storage/{filename}', function ($filename) {
        if (Storage::disk('sftp')->exists($filename)) {
            $content = Storage::disk('sftp')->get($filename);
            return response($content, 200)->header('Content-Type', 'image/jpeg');
        } else {
            abort(404);
        }
    });
}

