<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;


class Login extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;


    public function render()
    {
        return view('livewire.login')
        ->extends('components.layouts.app')
        ->title('Login');
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (\Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            session()->flash('message', 'You are logged in successfully.');
            return redirect()->route('welcome');
        } else {
            // Authentication failed.
            session()->flash('error', 'email and password are wrong.');
        }

    }

}
