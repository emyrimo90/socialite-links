<?php

use Illuminate\Support\Facades\Route;
use EmanElroukh\SocialiteLinks\Controllers\SocialiteAuthController;

Route::middleware(['web'])->group(function () {
    Route::get('auth/{provider}', [SocialiteAuthController::class, 'redirectToProvider']);
    Route::get('auth/{provider}/callback', [SocialiteAuthController::class, 'handleProviderCallback']);
});
