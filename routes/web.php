<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogImportController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/data', [DataController::class, 'index'])->name('list');
    Route::get('/data/import', [DataController::class, 'import'])->name('import');
    Route::post('/data/importing', [DataController::class, 'importCsv'])->name('importing');

    Route::prefix('handle')->group(function () {
        Route::get('/handle_next', [DataController::class, 'addCategoryData'])->name('handle_next');
        Route::get('/handle_all', [DataController::class, 'addCategoryDataAll'])->name('handle_all');
        Route::get('/handle', [DataController::class, 'view'])->name('view');
    });

    Route::prefix('keyword')->name('keyword.')->group(function () {
        Route::get('/', [KeywordController::class, 'index'])->name('list');
        Route::get('/add', [KeywordController::class, 'add'])->name('add');
        Route::post('/store', [KeywordController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [KeywordController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [KeywordController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [KeywordController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('list');
        Route::get('/add', [CategoryController::class, 'add'])->name('add');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('log_import')->name('log_import.')->group(function () {
        Route::get('/', [LogImportController::class, 'index'])->name('list');
        Route::get('/update/{code}/{id}', [LogImportController::class, 'update'])->name('update');
        Route::get('/hidden/{code}/{id}', [LogImportController::class, 'hidden'])->name('hidden');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
