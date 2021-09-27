<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SettingTranslatableController;
use App\Http\Controllers\Admin\Translate\CategoryController as TranslateCategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.home.home');
})->name('home');

Route::prefix('lang')->name('lang.')->group(function () {
    Route::get('/all', [LanguageController::class, 'index'])->name('all');
    Route::get('/edit/{id}', [LanguageController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [LanguageController::class, 'update'])->name('update');
    Route::patch('/status/{id}', [LanguageController::class, 'status'])->name('status');
    Route::patch('/default/{id}', [LanguageController::class, 'default'])->name('default');
    // Route::delete('/delete/{id}',[LanguageController::class,'destroy'])->name('delete');
    // Route::get('/new',[LanguageController::class,'create'])->name('create');
    // Route::post('/new',[LanguageController::class,'store'])->name('store');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/all', [UserController::class, 'index'])->name('all');
    Route::get('/new', [UserController::class, 'create'])->name('create');
    Route::post('/new', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::patch('/delete/{id}', [UserController::class, 'photoDelete'])->name('photo.delete');
});

Route::prefix('setting')->name('setting.')->group(function () {
    Route::get('contact', [SettingController::class, 'contact'])->name('contact');
    Route::patch('contact', [SettingController::class, 'contactUpdate'])->name('contact.update');
    Route::prefix('files')->group(function () {
        Route::get('/', [SettingController::class, 'files'])->name('files');
        Route::post('/logo', [SettingController::class, 'logo'])->name('logo');
        Route::post('/robot', [SettingController::class, 'robot'])->name('robot');
        Route::post('/sitemap', [SettingController::class, 'sitemap'])->name('sitemap');
    });
    Route::prefix('text')->group(function () {
        Route::get('/all', [SettingTranslatableController::class, 'index'])->name('text');
        Route::get('/new', [SettingTranslatableController::class, 'create'])->name('create');
        Route::post('/new', [SettingTranslatableController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SettingTranslatableController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [SettingTranslatableController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SettingTranslatableController::class, 'destroy'])->name('delete');
    });




    // Route::get('text',function(){
    //     dd(config('app.available_locale'));
    // });
});

Route::prefix('/category')->name('category.')->group(function () {
    Route::get('/all', [CategoryController::class, 'index'])->name('all');
    Route::get('/new', [CategoryController::class, 'create'])->name('create');
    Route::post('/new', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    Route::prefix('translate/{cid}')->name('translate.')->group(function () {
        Route::get('/all', [TranslateCategoryController::class, 'index'])->name('all');
        Route::get('/create', [TranslateCategoryController::class, 'create'])->name('create');
        Route::post('/create', [TranslateCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TranslateCategoryController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [TranslateCategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [TranslateCategoryController::class, 'destroy'])->name('delete');
    });
});
