<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginAdmin extends Component
{

    public $name, $password;


    protected $rules = [
        'name' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();
        if (Auth::attempt([
            'name' => $this->name,
            'password' => $this->password
        ])) {
            session()->flash('message', 'Giriş Yapıldı');
            return redirect()->route('admin.home');
        } else {
            session()->flash('message_error', 'Kullanıcı Adı/Parola Hatalı');
        }
    }


    public function logout()
    {
        Auth::logout();
        session()->flash('message', 'Çıkış Yapıldı');
        return redirect()->route('admin.login');
    }

    public function render()
    {
        return view('livewire.admin.login-admin')->layout('layouts.admin');
    }
}
