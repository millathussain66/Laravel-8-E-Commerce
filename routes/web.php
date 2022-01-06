<?php

use App\Http\Livewire\Admin\AdminDeshbordComponent;
use App\Http\Livewire\CardComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDeshbordComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', HomeComponent::class);
Route::get('/shop',ShopComponent::class );
Route::get('/card',CardComponent::class);
Route::get('/checkout',CheckoutComponent::class );
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// for user And customars
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('user/dashboard',UserDeshbordComponent::class)->name('user.dashboard');
});

// For Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){

    Route::get('admin/dashboard',AdminDeshbordComponent::class)->name('admin.dashboard');


});
