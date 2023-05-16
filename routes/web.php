<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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
    return view('welcome');
})->name('home');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');

route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/category/{category:name}/ads', [PublicController::class, 'adsByCategory'])->name('category.ads');

Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');


Route::middleware(['isRevisor'])->group(function () {
    Route::get('/revisor', [RevisorController::class, 'index'])->name('revisor.home');
    Route::get('/revisor/ads', [RevisorController::class, 'indexJSON'])->name('revisor.json');
    Route::get('/revisor/ad/accept/{ad}', [RevisorController::class, 'accept'])->name('revisor.aprobate');

    
    Route::get('/revisor/aprobate',[RevisorController::class,'ApprovedCountJSON'])->name('revisor.aprobate.count');

    Route::get('/revisor/pending',[RevisorController::class,'PendingCountJSON'])->name('revisor.pending.count');

    Route::get('/revisor/ads/edit/{ad}', [AdController::class, 'edit'])->name('revisor.edit');
    Route::post('/revisor/ads/edit/{ad}', [AdController::class, 'update'])->name('ads.update');

    Route::delete('/revisor/ads/delete/{ad}',[AdController::class,'destroy'])->name('revisor.delete');


    Route::get('/revisor/ads/search/{query}', [RevisorController::class, 'searchJSON'])->name('revisor.search');

    Route::patch('/revisor/ad/{ad}/accept', [RevisorController::class, 'acceptAd'])->name('revisor.ad.accept');
    Route::patch('/revisor/ad/{ad}/reject', [RevisorController::class, 'rejectAd'])->name('revisor.ad.reject');
});
Route::get('/revisor/become', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('revisor.become');
Route::get('revisor/{user}/make', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('revisor.make');

Route::post('/locale/{locale}', [PublicController::class, 'setLocale'])->name('locale.set');

Route::get('/quienes-somos', function () {
    return view('about-us');
})->name('about-us');