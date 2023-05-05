<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\GroupSettingController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->prefix('admin')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.layout');
        });

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('pages', PageController::class)->except('show');
        //Route::get('/pages/{page}/list', [PageController::class, 'index'])->name('pages.list');
        Route::get('/pages/list/{type}/{id?}', [PageController::class, 'index'])->name('pages.list');
        Route::get('/pages/create/{type}/{id?}', [PageController::class, 'create'])->name('pages.create');

        Route::post('/upload', ImageUploadController::class)->name('upload');

        Route::get('/globals/edit', [GlobalController::class, 'edit'])->name('globals.edit');
        Route::post('/globals/update', [GlobalController::class, 'update'])->name('globals.update');

        // super admin
        Route::resource('settings', SettingController::class)->except('show');
        Route::resource('settings/group', GroupSettingController::class)->except('show')
            ->names('group_settings');
        Route::resource('users', UserController::class)->except('show');
        Route::post('/users/{user}/send-email', [UserController::class, 'sendEmail'])
            ->name('users.send-email');

        // Uniquement role -> super-admin
        Route::resource('manager', ManagerController::class)->except('show');

        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });

require __DIR__.'/auth.php';


Route::get('/', [FrontController::class, 'index']);
Route::get('/{page:slug}', [FrontController::class, 'index']);
