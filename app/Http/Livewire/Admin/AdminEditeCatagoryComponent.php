<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditeCatagoryComponent extends Component
{
    public $catagory_slug;
    public $catagory_id;
    public $name;
    public $slug;

    public function genarateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function mount($catagory_slug)
    {
        $this->catagory_slug = $catagory_slug;
        $catagory = Catagory::where('slug',$this->catagory_slug)->first();
        $this->name =  $catagory->name;
        $this->catagory_id = $catagory->id;
        $this->slug =  $catagory->slug;
    }

    public function updateCatagory()
    {

        $catagory = Catagory::find($this->catagory_id);
        $catagory->name = $this->name;
        $catagory->slug =$this->catagory_slug;
        $catagory->update();
        session()->flash('message','Catagory Update Successfully');

    }

    public function render()
    {
        return view('livewire.admin.admin-edite-catagory-component')->layout('layouts.base');
    }
}
