<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/hosteldetails', function () {
    return view('hosteldetails');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/hostels', function () {
    return view('admin.hostels');
});

Route::get('/admin/hostels/create', function () {
    return view('admin.hostels.create');
});

Route::get('/admin/hostels/{id}/edit', function ($id) {
    return view('admin.hostels.edit', ['id' => $id]);
});

Route::get('/admin/hostels/{id}/delete', function ($id) {
    return view('admin.hostels.delete', ['id' => $id]);
});

Route::get('/admin/hostels/{id}/view', function ($id) {
    return view('admin.hostels.view', ['id' => $id]);
});
    
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

