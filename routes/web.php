<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/portofolio', function () {
    return view('portofolio.portofolio');
});
