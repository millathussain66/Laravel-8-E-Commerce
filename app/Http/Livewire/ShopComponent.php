<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;
use App\Models\Catagory;




class ShopComponent extends Component
{


    public $sorting;
    public $parpage;

    public function mount()
    {
        $this->sorting = "default";
        $this->parpage = 12;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('message','Item Add in Card');
        return redirect()->route('product.card');
    }


  use WithPagination;
    public function render()
    {
        if($this->sorting=="date"){

            $product = Product::orderBy('created_at','DESC')->paginate($this->parpage);

        }else if($this->sorting=="price") {

            $product = Product::orderBy('reguler_price','ASC')->paginate($this->parpage);

        }else if ($this->sorting=="price-desc"){
            $product = Product::orderBy('reguler_price','DESC')->paginate($this->parpage);
        }else{

            $product = Product::paginate($this->parpage);
        }
        // Form Catagory

        $catagory = Catagory::all();

        return view('livewire.shop-component',
        [
            'posts' => $product,
            'catagory'=>$catagory
        ]
        )->layout('layouts.base');
    }

}
