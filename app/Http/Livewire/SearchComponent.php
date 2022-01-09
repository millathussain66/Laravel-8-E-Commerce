<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;
use App\Models\Catagory;

class SearchComponent extends Component
{
    public $sorting;
    public $parpage;

    public $search;
    public $product_cat;
    public $product_cat_id;


    public function mount()
    {
        $this->sorting = "default";
        $this->parpage = 12;

        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('message', 'Item Add in Card');
        return redirect()->route('product.card');
    }


    use WithPagination;
    public function render()
    {
        if ($this->sorting == "date") {

            $product = Product::where('name', 'like', '%' . $this->search . '%')->where('catagorie_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->parpage);
        } else if ($this->sorting == "price") {

            $product = Product::where('name', 'like', '%' . $this->search . '%')->where('catagorie_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('reguler_price', 'ASC')->paginate($this->parpage);
        } else if ($this->sorting == "price-desc") {
            $product = Product::where('name', 'like', '%' . $this->search . '%')->where('catagorie_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('reguler_price', 'DESC')->paginate($this->parpage);
        } else {

            $product = Product::where('name', 'like', '%' . $this->search . '%')->where('catagorie_id', 'like', '%' . $this->product_cat_id . '%')->paginate($this->parpage);
        }
        // Form Catagory

        $catagory = Catagory::all();

        return view(
            'livewire.search-component',
            [
                'posts' => $product,
                'catagory' => $catagory
            ]
        )->layout('layouts.base');
    }
}
