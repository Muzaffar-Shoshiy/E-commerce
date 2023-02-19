<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\AccountComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CompareComponent;
use App\Http\Livewire\DetailComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\OrderComponent;
use App\Http\Livewire\SearchProductComponent;
use App\Http\Livewire\SortByCategoryComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/compare', CompareComponent::class)->name('compare');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
Route::get('/checkout', CheckoutComponent::class)->name('checkout')->middleware('auth');
Route::get('/order', OrderComponent::class)->name('order')->middleware('auth');
Route::get('/product/{slug}', DetailComponent::class)->name('product');
Route::get('/category/{slug}', SortByCategoryComponent::class)->name('category');
Route::view('/navigation', 'backend.navigation')->middleware('can:isAdmin');
Route::get('/search', SearchProductComponent::class)->name('search');
Route::get('/my-account', AccountComponent::class)->name('account')->middleware('auth');

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Auth::routes();
