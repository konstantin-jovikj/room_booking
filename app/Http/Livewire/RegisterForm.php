<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{

    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $role = '2';
    public string $phone = '';
    public string $user_address = '';
    public string $user_zip = '';
    public string $user_place = '';
    public string $user_country = '';


    protected $rules = [
        'first_name' => ['required', 'min:2'],
        'last_name' => ['required', 'min:2'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
        'phone' => ['required', 'min:8'],
        'user_address' => ['required'],
        'user_zip' => ['required'],
        'user_place' => ['required'],
        'user_country' => ['required'],
    ];




    public function render()
    {
        return view('livewire.register-form');
    }

    public function register()
    {

        $this->validate();

        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->phone = $this->phone;
        $user->user_address = $this->user_address;
        $user->user_zip = $this->user_zip;
        $user->user_place = $this->user_place;
        $user->user_country = $this->user_country;

        $user->save();

        return redirect()->route('login')->with('success', 'Your Account was successfully created');
        // session()->flash('message', 'Your Account was successfully created');

        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
        $this->user_address = '';
        $this->user_zip = '';
        $this->user_place = '';
        $this->user_country = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
