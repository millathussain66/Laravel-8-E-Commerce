<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    // For Moving Cart Page
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('message','Item Add in Card');
        return redirect()->route('product.card');
    }




    public function render()
    {
    $product = Product::where('slug',$this->slug)->first();
    $populer= Product::inRandomOrder()->limit(4)->get();
    $reletedProduct =Product::where('catagorie_id',$product->catagorie_id)->inRandomOrder()->limit(5)->get();

    // All Data Passing Here

    return view('livewire.details-component',['product'=>$product,'populer_product'=>$populer,'reletedProudct'=> $reletedProduct])->layout('layouts.base');
    }
}
