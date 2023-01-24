<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Component
{

    public $name, $password, $password_re;

    protected $rules = [
        'name' => 'required|unique:users',
        'password' => 'required|min:6|required_with:password_re|same:password_re',
        'password_re' => 'required|min:6',
    ];

    public function store()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Kullanıcı Başarıyla Oluşturuldu');
    }

    public function delete($id)
    {
        User::destroy($id);
        session()->flash('message', 'Kullanıcı Başarıyla Silindi');
    }

    public function render()
    {
        return view('livewire.admin.create-admin', [
            'admins' => User::all()
        ])->layout('layouts.admin');
    }
}
