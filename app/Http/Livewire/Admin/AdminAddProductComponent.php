<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;

class AdminAddProductComponent extends Component
{
    public function render()
    {

        $catagory = Catagory::all();

        return view('livewire.admin.admin-add-product-component',['catagory' =>$catagory ])->layout('layouts.base');
    }
}
