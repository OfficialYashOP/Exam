<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;

// Test pages (will trigger page view middleware automatically)
Route::get('/', function () {
    return '<h1>Home Page</h1><p>Go to <a href="/about">About Page</a> or <a href="/analytics">Analytics Dashboard</a></p>';
});

Route::get('/about', function () {
    return '<h1>About Page</h1><p>Go back to <a href="/">Home Page</a></p>';
});

// Dashboard route
Route::get('/analytics', [AnalyticsController::class, 'index']);
