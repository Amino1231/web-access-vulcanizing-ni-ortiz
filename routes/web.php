<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'public::pages.index')->name('index');
Route::livewire('/about', 'public::pages.about-page')->name('about');
Route::livewire('/contact', 'public::pages.contact-page')->name('contact');
Route::livewire('/products', 'public::pages.product-page')->name('products');
Route::livewire('/shops', 'public::pages.shop-page')->name('shops');

Route::livewire('/login', 'auth::login')->name('login');
Route::livewire('/logout', 'auth::logout')->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::livewire('/dashboard', 'admin::pages.dashboard')->name('admin.dashboard');




});

Route::middleware(['auth', 'shop-owner', 'admin'])->prefix('shop-owner')->group(function () {

    Route::livewire('/dashboard', 'shop-owner::pages.dashboard')->name('shop-owner.dashboard');


});

Route::middleware(['auth', 'customer', 'admin'])->prefix('customer')->group(function () {

    Route::livewire('/dashboard', 'customer::pages.dashboard')->name('customer.dashboard');

});

Broadcast::routes();

