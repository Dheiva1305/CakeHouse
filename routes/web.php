<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SettingController;
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



//Frontend Route


// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/', [FrontendController::class, 'home'])->name('home');

// Route::get('/home', function (){
//     return view('frontend.homepage');
// });

Route::get('/', [FrontendController::class, 'homepage'])->name('homepage');

// Route::get('/about-us', function (){
//     return view('frontend.about');
// });

Route::get('/about-us', [FrontendController::class, 'about'])->name('about-us');

// Route::get('/gallery', function (){
//     return view('frontend.gallery');
// });

Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');

// Route::get('/contact', function (){
//     return view('frontend.contact');
// });

Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');


// Route::get('/services', function (){
//     return view('frontend.service');
// });

Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/services/{slug}', [FrontendController::class, 'serviceDetail'])->name('services_detail');

Route::post('contact_us', [SettingController::class, 'contact_us'])->name('contact_us');

Route::post('newsletters', [SettingController::class, 'newsletters'])->name('newsletters');



//Admin Route

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('store');

//Route::middleware('auth:sanctum')->prefix('admin')->group(function(){     
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');

    Route::get('contact-list', [AdminController::class, 'contact_list'])->name('admin.contact_list');
    
    Route::get('newsletter-list', [AdminController::class, 'newsletter_list'])->name('admin.newsletter_list');

    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');

    Route::post('setting_update', [AdminController::class, 'setting_update'])->name('admin.setting_update');

    Route::get('service/index', [AdminController::class, 'service_index'])->name('admin.service.index');
    Route::get('service/create', [AdminController::class, 'service_create'])->name('admin.service.create');
    Route::post('service/store', [AdminController::class, 'service_store'])->name('admin.service.store');
    Route::get('service/edit/{id}', [AdminController::class, 'service_edit'])->name('admin.service.edit');
    Route::post('service/update/{id}', [AdminController::class, 'service_update'])->name('admin.service.update');
    Route::post('service/delete/{id}', [AdminController::class, 'service_delete'])->name('admin.service.delete');

    Route::get('gallery/index', [AdminController::class, 'gallery_index'])->name('admin.gallery.index');
    Route::get('gallery/create', [AdminController::class, 'gallery_create'])->name('admin.gallery.create');
    Route::post('gallery/store', [AdminController::class, 'gallery_store'])->name('admin.gallery.store');
    Route::get('gallery/edit/{id}', [AdminController::class, 'gallery_edit'])->name('admin.gallery.edit');
    Route::post('gallery/update/{id}', [AdminController::class, 'gallery_update'])->name('admin.gallery.update');
    Route::post('gallery/delete/{id}', [AdminController::class, 'gallery_delete'])->name('admin.gallery.delete');

    Route::get('home_slider/index', [AdminController::class, 'home_slider_index'])->name('admin.home_slider.index');
    Route::get('home_slider/create', [AdminController::class, 'home_slider_create'])->name('admin.home_slider.create');
    Route::post('home_slider/store', [AdminController::class, 'home_slider_store'])->name('admin.home_slider.store');
    Route::get('home_slider/edit/{id}', [AdminController::class, 'home_slider_edit'])->name('admin.home_slider.edit');
    Route::post('home_slider/update/{id}', [AdminController::class, 'home_slider_update'])->name('admin.home_slider.update');
    Route::post('home_slider/delete/{id}', [AdminController::class, 'home_slider_delete'])->name('admin.home_slider.delete');


    Route::get('category/index', [AdminController::class, 'category_index'])->name('admin.category.index');
    Route::get('category/create', [AdminController::class, 'category_create'])->name('admin.category.create');
    Route::post('category/store', [AdminController::class, 'category_store'])->name('admin.category.store');
    Route::get('category/edit/{id}', [AdminController::class, 'category_edit'])->name('admin.category.edit');
    Route::post('category/update/{id}', [AdminController::class, 'category_update'])->name('admin.category.update');
    Route::post('category/delete/{id}', [AdminController::class, 'category_delete'])->name('admin.category.delete');

//  });






