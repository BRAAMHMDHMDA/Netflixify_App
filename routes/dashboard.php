<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dash\{
    CategoryController,
    SettingsController,
    ProfileController,
    AdminController,
    RoleController,
    MovieController,
    HomeController,
};

Route::group([
    'middleware' => ['guest:admin'],
], function (){
    // ============================================ LOGIN PAGE
    Route::view('/login', 'dashboard.auth.login')->name('login');
});


Route::group(['middleware' => 'auth:admin'], function () {
    // Route Home Page
    Route::get('/home', HomeController::class)->name('home');
    Route::redirect('/', '/dashboard/home');

    // Routes Categories
    Route::resource('categories', CategoryController::class)->except('show');

    // Routes Settings
    Route::get('settings/{group?}', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings/{group}', [SettingsController::class, 'update'])->name('settings.update');

    // Routes Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/settings', [ProfileController::class, 'accountSettings'])->name('profile.settings');
    Route::put('profile/update', [ProfileController::class, 'updateBasicInfo'])->name('profile.update');
    Route::patch('profile/update/email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    Route::patch('profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

    // Routes Users
    Route::resource('/users',\App\Http\Controllers\Dash\UserController::class);

    // Routes Admins
    Route::resource('/admins',AdminController::class);

    // Routes Movies
    Route::resource('/movies',MovieController::class);
    Route::patch('/movies/publish/{movie}',[MovieController::class,'publish_movie'])->name('movie.publish');

    // Routes Roles
    Route::resource('/roles', RoleController::class);

});
