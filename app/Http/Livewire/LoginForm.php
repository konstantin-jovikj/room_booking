<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{

    public string $email = '';
    public string $password = '';



    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
    ];

    public function authenticate()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        if (Auth::attempt($credentials)) {
            // Authentication successful
            if(Auth::user()->role_id == 2)
            {
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/dashboard/admin');
            }
        } else {
            // Authentication failed
            // $this->addError('authentication', 'Invalid credentials.');
            session()->flash('error', 'Invalid credentials');
        }

    }


    public function render()
    {
        return view('livewire.login-form');
    }
}
