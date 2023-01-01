<?php

use App\Http\Controllers\Admin\AboutmeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ContactController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

// Front-End Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact');

//Admin Panel
Route::middleware(['auth','isAdmin'])->name('admin.')->prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/qualification/education', [QualificationController::class,'showEducation'])->name('qualification.edu');
    Route::get('/qualification/experience', [QualificationController::class,'showExperience'])->name('qualification.exp');
    Route::resource('/qualification', QualificationController::class);
    Route::resource('/skill', SkillController::class);
    Route::resource('/service', ServiceController::class);
    Route::resource('/review', ReviewController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/portfolio/search', [PortfolioController::class,'search'])->name('portfolio.search');
    Route::resource('/portfolio', PortfolioController::class);
    Route::resource('/aboutme', AboutmeController::class);
    Route::resource('/setting', SettingController::class);
});

Auth::routes();
