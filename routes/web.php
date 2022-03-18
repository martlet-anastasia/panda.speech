<?php

    use App\Http\Controllers\Dashboard\FileController;
    use Illuminate\Support\Facades\Auth;
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
        return view('home');
    })->middleware('auth');

    Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::match(['get', 'post'], '/test1', function () {
        return view('app.dashboard');
    })->name('billing');

    Route::post('/file-uploading', [\App\Http\Controllers\Dashboard\FileUploadController::class, 'checkFileType'])->name('upload');



    Route::resource('/files', FileController::class);
