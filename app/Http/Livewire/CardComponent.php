<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

use Illuminate\Support\Facades\Session as FacadesSession;

class CardComponent extends Component
{

    // incrice Card product

    public function increase($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }
    // dicrice
    public function reduce($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }
    // Delete Product
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('message', 'Post successfully updated.');


    }

    public function render()
    {
        return view('livewire.card-component')->layout('layout.base');
    }
}
