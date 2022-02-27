<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;


class AdminEditeProductComponent extends Component
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
    public $newimage;
    public $productid;


    public function mount($product_slug)
    {
        $porduct = Product::where('slug',$product_slug)->first();

        $this->name =               $porduct->name;
        $this->slug =               $porduct->slug;
        $this->short_description =  $porduct->short_description;
        $this->description =        $porduct->description;
        $this->reguler_price =      $porduct->reguler_price;
        $this->sele_price =         $porduct->sele_price;
        $this->SKU =                $porduct->SKU;
        $this->stock_status =       $porduct->stock_status;
        $this->featuare =           $porduct->featuare;
        $this->queantity =          $porduct->queantity;
        $this->image =              $porduct->image;
        $this->catagories_id =      $porduct->catagories_id;
        $this->newimage =           $porduct->newimage;
        $this->productid =          $porduct->productid;

    }

    public function genaretSlug()
    {

        $this->slug = Str::slug($this->name,'-');

    }

    public function updateProduct()
    {


        $product= Product::find($this->productid);

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

        if($this->newimage){

            $imageName = Carbon::now()->timestamp.'-'.$this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;

        }
        $product->catagories_id              = $this->catagories_id;
        $product->save();
        session()->flash('message','Product Hasbeen Update');

    }





    public function render()
    {
        $catagory= Catagory::all();
        return view('livewire.admin.admin-edite-product-component',['catagory' => $catagory])->layout('layouts.base');
    }
}
