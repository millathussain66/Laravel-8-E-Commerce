<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $product = Product::paginate(12);
        return view('livewire.shop-component', ['products'=> $product])->layout('layout.base');
    }

}
