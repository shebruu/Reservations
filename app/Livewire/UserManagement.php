<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{

    public $users;
    public $showEditModal = false;
    public $userIdBeingEdited;
    public $name;
    public $email;

    public function mount()
    {
        $this->users = User::all();
    }
    public function edit($userId)
    {
        $this->showEditModal = true;
        $user = User::findOrFail($userId);
        $this->userIdBeingEdited = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function saveChanges()
    {
        $user = User::find($this->userIdBeingEdited);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->showEditModal = false;
    }

    public function delete($userId)
    {
        User::find($userId)->delete();
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.user-management');
    }
}
