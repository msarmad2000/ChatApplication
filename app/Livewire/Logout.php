<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
            Auth::logout();
            session()->flash('message', 'Logged out successfully.');
            return redirect()->to('/');


    }
    public function render()
    {
        return view('livewire.logout');
    }
}
