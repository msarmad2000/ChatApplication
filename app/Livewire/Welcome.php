<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

#[Title('Welcome')]
class Welcome extends Component
{
    public $users;
    public $messages;

    public function mount()
    {
        // $this->users = User::with('messages')->get();
    }
    // public function updateSelectedUser($userId)
    // {
    //     $this->selectedUser = $this->users->find($userId);
    //     $this->mergeMessages();
    // }
    public function render()
    {
        return view('livewire.welcome')
        ->extends('components.layouts.app')
        ->title('Welcome');
    }

}
