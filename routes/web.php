<?php

use App\Http\Controllers\SkillController;
use  App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get("/","liste");
    Route::get("/public/{id}", "public");
    Route::get('/sign', 'create');
    Route::post('/sign', 'store');
    Route::get('/login', 'login');
    Route::post('/login', 'auth');
    Route::get('/user', 'liste');
    Route::middleware('auth')->group(function () {
        Route::get('/profile', 'profile');
        Route::get('/profile/edit', 'edit');
        Route::post('/profile/edit', 'update');
        Route::get('/profile/skill', 'addSkill');
        Route::post('/profile/skill', 'skillAdded');
        Route::get('/logout', 'logout');
    });
});

Route::controller(SkillController::class)->group(function () {
    Route::prefix('skill')->group(function (){
        Route::get('/', 'index');
        Route::middleware('auth')->group(function () {
            Route::get('/create', 'create');
            Route::post('/create', 'store');
            Route::get('/edit/{id}', 'edit');
            Route::post('/edit/{id}', 'update');
        });
    });
});
