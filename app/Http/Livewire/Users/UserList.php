<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.users.user-list', compact('users'));
    }
}
