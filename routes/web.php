<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});

// Route::get('/type', function () {
//     return view('type');
// });

// Route::get('/service', function () {
//     return view('service');
// });

// Route::get('/contact', function () {
//     return redirect('/home#contact');
// });


// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/product', function () {
    return view('product');
});

Route::get('/promotion', function () {
    return view('promotion');
});
