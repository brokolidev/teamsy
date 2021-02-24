<?php

namespace App\Http\Livewire;

use App\Models\Tenant;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $companyName = '';
    public $email = '';
    public $password = '';

    public function register()
    {
        dd('here');
        $this->validate([
            'name' => ['required', 'string'],
            'companyName' => ['required', 'string', 'unique:tenants,name'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        $tenant = Tenant::create([
            'name' => $this->companyName,
        ]);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'role' => 'admin',
            'password' => Hash::make($this->password),
            'tenant_id' => $tenant->id,
        ]);

        $user->sendEmailVerificationNotification();

        Auth::login($user, true);

        redirect(route('home'));
    }


    public function render()
    {
        return view('livewire.register');
    }
}
