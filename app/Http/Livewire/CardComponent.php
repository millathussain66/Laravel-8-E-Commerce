<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CardComponent extends Component
{

    public function incriceQuentity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty+1;
        Cart::update($rowId, $qty);

    }

    public function dicriceQuentity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty-1;
        Cart::update($rowId, $qty);
    }





    public function render()
    {
        return view('livewire.card-component')->layout('layout.base');
    }
}
