<?php

use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\SiteMapsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CompaniesController;
use App\Http\Controllers\admin\ReviewsController;

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

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', function () {
            return view('backend.index');
        })->name('dashboard');
        Route::resource('company', CompaniesController::class)->except(['show', 'create']);
        Route::resource('review', ReviewsController::class)->except(['show']);
        Route::post('toggle-review-approve/{review}', [ReviewsController::class, 'toggleReviewApprove'])->name('toggleReviewApprove');
        Route::resource('users', UsersController::class)->only(['index', 'destroy']);
    });
});
Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/submit-review', [FrontEndController::class, 'submitReview'])->name('submitReview');
Route::post('/submit-review', [FrontEndController::class, 'submitReviewForm'])->name('submitReviewForm');
Route::get('/submit-response', [FrontEndController::class, 'submitResponse'])->name('submitResponse');
Route::post('/submit-response', [FrontEndController::class, 'submitResponseForm'])->name('submitResponseForm');
Route::get('/donate', [FrontEndController::class, 'donate'])->name('donate');
Route::get('/contact-us', [FrontEndController::class, 'contactUs'])->name('contactUs');
Route::post('/contact-us', [FrontEndController::class, 'contactUsForm'])->name('contactUsForm');
Route::get('sitemap.xml', [SiteMapsController::class, 'main_sitemap'])->name('main_sitemap');
Route::get('companies/{company:slug}', [FrontEndController::class, 'company'])->name('company');
require __DIR__ . '/auth.php';
