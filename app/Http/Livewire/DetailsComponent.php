<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
    $product = Product::where('slug',$this->slug)->first();
    $populer= Product::inRandomOrder()->limit(4)->get();
    $reletedProduct =Product::where('catagorie_id',$product->catagorie_id)->inRandomOrder()->limit(5)->get();

    // All Data Passing Here

    return view('livewire.details-component',['product'=>$product,'populer_product'=>$populer,'reletedProudct'=> $reletedProduct])->layout('layout.base');
    }
}
