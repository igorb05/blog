<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrixController;
use App\Http\Controllers\User\PasswordController as UserPasswordController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\User\SettingsController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\EmailConfirmedMiddleware;

// Главная
Route::get('/', [PostController::class, 'index'])->name('home');
// Поиск по постам
Route::get('/post', [SearchController::class, 'index'])->name('search');
// Детальная поста
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('posts.show');
// О нас
Route::view('/about','about.index')->name('about');

//// Маршруты для гостя
Route::middleware('guest')->group(function () {

    // Регистрация
    Route::get('registration', [RegistrationController::class, 'index'])->name('registration');
    Route::post('registration', [RegistrationController::class, 'store'])->name('registration.store');

    // Вход
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    // Восстановление пароля
    Route::view('/password', 'password.index')->name('password');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
    Route::view('/password/confirmation', 'password.confirmation')->name('password.confirmation');
    Route::get('/password/{password:uuid}', [PasswordController::class, 'edit'])->name('password.edit')->whereUuid('password');
    Route::post('/password/{password:uuid}', [PasswordController::class, 'update'])->name('password.update')->whereUuid('password');
});

// Подтвержение email
Route::get('email/confirmation', [EmailController::class, 'index'])->name('email.confirmation')->middleware('auth');
Route::any('email/{email:uuid}/confirm', [EmailController::class, 'confirm'])->name('email.confirm')->whereUuid('email');
Route::post('email/{email:uuid}/send', [EmailController::class, 'send'])->name('email.send')->whereUuid('email');

Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

//// Маршруты для аутентифицированого пользователя
Route::middleware('auth')->group(function () {

    // Настройки пользователя
    Route::redirect('/user', '/user/settings')->name('user');
    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');

    // Смена пароля
    Route::view('/user/settings/password/update', 'password.update' )->name('user.settings.password.update');
    Route::put('/user/settings/password/update', [UserPasswordController::class, 'update'])->name('user.settings.password.update');

    // Смена email
    Route::view('/user/settings/email/update', 'about.index')->middleware(EmailConfirmedMiddleware::class)->name('user.settings.email.update');

    // Посты
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->whereNumber('post');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->whereNumber('post');

    Route::post('/posts/comment', [CommentController::class, 'store'])->name('posts.comment.store');

    // Для Trix Editor
    Route::post('/trix/upload', [TrixController::class, 'store'])->name('trix.store');
    Route::delete('/trix/upload/delete', [TrixController::class, 'delete'])->name('trix.delete');
});






