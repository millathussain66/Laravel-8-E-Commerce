<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDeshbordComponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-deshbord-component')->layout('layout.base');
    }
}
