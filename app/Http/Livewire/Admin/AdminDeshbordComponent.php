<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDeshbordComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-deshbord-component')->layout('layout.base');
    }
}
