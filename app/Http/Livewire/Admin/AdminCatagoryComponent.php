<?php

namespace App\Http\Livewire\Admin;

use App\Models\Catagory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCatagoryComponent extends Component
{

    use WithPagination;

    public function deleteCatagory($id)
    {

        $catagorie = Catagory::find($id);
        $catagorie->delete();

        session()->flash('message' , 'catagory Delete Successfully');







    }




    public function render()
    {
        $catagoris = Catagory::paginate(5);
        return view('livewire.admin.admin-catagory-component',['catagory'=>$catagoris])->layout('layouts.base');
    }
}
