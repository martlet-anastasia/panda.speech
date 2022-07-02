<?php

    use App\Http\Controllers\App\FileController;
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
        return redirect('/home');
    })->middleware('auth');

    Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resources([
        'file' => \App\Http\Controllers\FileController::class
    ]);

    Route::match(['get', 'post'], '/test1', function () {
        return view('app.dashboard');
    })->name('billing');

    Route::post('/file-uploading', [\App\Http\Controllers\App\FileUploadController::class, 'checkFileType'])->name('upload');



    Route::resource('/files', FileController::class);
