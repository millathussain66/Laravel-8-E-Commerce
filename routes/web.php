<?php

use App\Http\Livewire\Admin\AdminAddCatagoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCatagoryComponent;
use App\Http\Livewire\Admin\AdminDeshbordComponent;
use App\Http\Livewire\Admin\AdminEditeCatagoryComponent;
use App\Http\Livewire\Admin\AdminEditeProductComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\CardComponent;
use App\Http\Livewire\CatagoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDeshbordComponent;
use Illuminate\Support\Facades\Route;


// All Route Here ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', HomeComponent::class);
Route::get('/shop',ShopComponent::class );
Route::get('/card',CardComponent::class)->name('product.card');
Route::get('/checkout',CheckoutComponent::class );
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product_catagory/{catagory_slug}',CatagoryComponent::class)->name('product.catagory');


Route::get('/search',SearchComponent::class)->name('product.search');



// for user And customars
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('user/dashboard',UserDeshbordComponent::class)->name('user.dashboard');
});

// For Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){


    Route::get('admin/dashboard',AdminDeshbordComponent::class)->name('admin.dashboard');
    Route::get('admin/catagoris',AdminCatagoryComponent::class)->name('admin.catagoris');
    Route::get('admin/addcatagoris/add',AdminAddCatagoryComponent::class)->name('admin.addCatagory');
    Route::get('admin/addcatagoris/edite/{catagory_slug}',AdminEditeCatagoryComponent::class)->name('admin.editeCatagory');
    Route::get('admin/products', AdminProductComponent::class)->name('admin.product');
    Route::get('admin/addproduct/add' , AdminAddProductComponent::class)->name('admin.addProduct');

    Route::get('admin/products/edite/{product_slug}', AdminEditeProductComponent::class)->name('admin.editeProduct');





});
