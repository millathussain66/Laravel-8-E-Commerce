<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public  $search;
    public  $product_cat;
    public  $product_cat_id;

   public function mount(){
       $this->search ="all Catagory";

       $this->fill(request()->only('search','product_cat','product_cat_id'));


    }

    public function render()
    {
        $catagory = Catagory::all();

        return view('livewire.header-search-component',
        [
            'catagory' =>  $catagory,
        ]
        );
    }
}
