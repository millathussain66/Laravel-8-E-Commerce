<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;
use App\Models\Catagory;


class CatagoryComponent extends Component
{

    public $sorting;
    public $parpage;
    public $catagory_slug;

    public function mount($catagory_slug)
    {
        $this->sorting = "default";
        $this->parpage = 12;
        $this->catagory_slug=$catagory_slug;
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

        $catagories = Catagory::where('slug',$this->catagory_slug)->first();
        $catagory_id = $catagories->id;
        $catagory_name = $catagories->name;

        // if($this->sorting=="date"){

        // $catagory_id = $catagory->id;
        // $product = Product::where('catagorie_id', $catagory_id)->orderBy('created_at','DESC')->paginate($this->parpage);

        // }else if($this->sorting=="price") {

        //     $product = Product::where('catagorie_id', $catagory_id)->orderBy('reguler_price','ASC')->paginate($this->parpage);

        // }else if ($this->sorting=="price-desc"){
        //     $product = Product::where('catagorie_id', $catagory_id)->orderBy('reguler_price','DESC')->paginate($this->parpage);
        // }else{

        //
        // }

        $product = Product::where('catagorie_id', $catagory_id)->paginate($this->parpage);
        $catagory = Catagory::all();

        return view('livewire.catagory-component',
        [
            'posts' => $product,
            'catagory'=>$catagory,
            'catagory_name'=>$catagory_name,
        ]
        )->layout('layouts.base');
    }

}
