<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Illuminate\Support\Str;


class AdminAddCatagoryComponent extends Component
{
    public $name;
    public $slug;
    public function genarateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function storeCatagoryu()
    {
      $catagory = new Catagory();
      $catagory->name = $this->name;
      $catagory->slug = $this->slug;
      $catagory->save();
      session()->flash('message','Catagory Added Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-catagory-component')->layout('layouts.base');;
    }
}
