<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{

    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $reguler_price;
    public $sele_price;
    public $SKU;
    public $stock_status;
    public $featuare;
    public $queantity;
    public $image;
    public $catagories_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featuare = 0;
    }
    public function genaretSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function addProduct()
    {
        $product = new Product();
        $product->name                       = $this->name;
        $product->slug                       = $this->slug;
        $product->short_description          = $this->short_description;
        $product->description                = $this->description;
        $product->reguler_price              = $this->reguler_price;
        $product->sele_price                 = $this->sele_price;
        $product->SKU                        = $this->SKU;
        $product->stock_status               = $this->stock_status;
        $product->featuare                   = $this->featuare;
        $product->queantity                  = $this->queantity;
        $imageName = Carbon::now()->timestamp.'-'.$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image                      = $imageName;
        $product->catagories_id              = $this->catagories_id;
        $product->save();
        session()->flash('message' , 'Product Added Successfully');

    }




    public function render()
    {

        $catagory = Catagory::all();

        return view('livewire.admin.admin-add-product-component',['catagory' =>$catagory ])->layout('layouts.base');
    }
}
