<?php

use Illuminate\Support\Facades\Route;




Route::get('/home', function () {
    return view('home');
});


Route::get('/', function () {
    return view('layout');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'ID: '. $id.'. Name: '.$name;
});

