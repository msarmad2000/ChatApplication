<?php

namespace App\Livewire;
use \Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Component;

#[Title('Registration')]
class Register extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.register')
        ->extends('components.layouts.app')
        ->title('Registration');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }
    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $this->password = Hash::make($this->password);
            User::create(['name' => $this->name, 'email' => $this->email,'password' => $this->password]);
            return $this->redirect('/');
            $this->resetInputFields();
    }

}
