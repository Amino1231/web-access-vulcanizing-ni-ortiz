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

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::livewire('/dashboard', 'admin::pages.dashboard')->name('admin.dashboard');

    Route::livewire('/users', 'admin::pages.user.view-user')->name('admin.users');
    Route::livewire('/customers', 'admin::pages.user.view-customer')->name('admin.customers');
    Route::livewire('/shop-owner', 'admin::pages.user.view-shop-owner')->name('admin.shop-owners');
    Route::livewire('/admin', 'admin::pages.user.view-admin')->name('admin.admins');
    Route::livewire('/users/create', 'admin::pages.user.create-user')->name('admin.users.create');
    Route::livewire('/users/{user}/edit', 'admin::pages.user.update-user')->name('admin.users.update');

    Route::livewire('/roles', 'admin::pages.role.view-role')->name('admin.roles');
    Route::livewire('/roles/create', 'admin::pages.role.create-role')->name('admin.roles.create');
    Route::livewire('/roles/{role}/edit', 'admin::pages.role.update-role')->name('admin.roles.update');

    Route::livewire('/category', 'admin::pages.category.view-category')->name('admin.category');
    Route::livewire('category/create', 'admin::pages.category.create-category')->name('admin.category.create');
    Route::livewire('category/{category}/edit', 'admin::pages.category.update-category')->name('admin.category.update');
    
});

Route::middleware(['auth', 'role:shop-owner|admin'])->prefix('shop-owner')->group(function () {

    Route::livewire('/dashboard', 'shop-owner::pages.dashboard')->name('shop-owner.dashboard');

    Route::livewire('/view-shop', 'shop-owner::pages.shop.view-shop')->name('shop-owner.view-shop');
    Route::livewire('/create-shop', 'shop-owner::pages.shop.create-shop')->name('shop-owner.create-shop');

});

Route::middleware(['auth', 'role:customer|admin'])->prefix('customer')->group(function () {

    Route::livewire('/dashboard', 'customer::pages.dashboard')->name('customer.dashboard');

});

Broadcast::routes();

