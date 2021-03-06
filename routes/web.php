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

    /** Google Auth **/
    Route::get('auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('file', \App\Http\Controllers\FileController::class)
        ->except(['show']);

    Route::get('file/{id}/configure-translate', [\App\Http\Controllers\TranslateController::class, 'configureTranslate'])
        ->name('file.translate');

    Route::post('transcription', [\App\Http\Controllers\TranslateController::class, 'runTranslate'])
        ->name('transcription');

    Route::get('file/{id}/show-translate', [\App\Http\Controllers\TranslateController::class, 'showTranslate'])
        ->name('translate.show');

   Route::get('translate/download/{id}', [\App\Http\Controllers\DownloadController::class, 'downloadTranslate'])
       ->name('translate.download');

    Route::get('translate/library', [\App\Http\Controllers\TranslateController::class, 'showTranslateAll'])
        ->name('translate.library');

    Route::get('translate.jobs', function () {
        return view('translate.jobs');
    })->name('translate.jobs');

    Route::get('profile', function () {
        return view('profile.index');
    })->name('profile');

    Route::get('tariff', function () {
        return view('tariff.index');
    })->name('tariff');
