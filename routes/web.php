<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

Route::get('/', function () {
    return redirect('/product');
});

Route::get('/login', function () {

    if (session()->has('email'))
        return redirect('/product');

    return view('login');

});

Route::get('/logout', function () {

    session()->flush();

    return redirect('/login');

});

Route::post('/auth', [SiteController::class, 'auth']);

Route::resource('product', ProductController::class);