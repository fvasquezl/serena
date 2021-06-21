<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class IndexUsers extends Component
{

    public function read()
    {
        return User::paginate(5);
    }

    public function render()
    {
        return view('livewire.index-users', [
            'users' => $this->read(),
        ]);
    }
}
