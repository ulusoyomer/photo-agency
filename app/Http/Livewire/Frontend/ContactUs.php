<?php

namespace App\Http\Livewire\Frontend;

use App\Models\ContactUs as ModelsContactUs;
use Livewire\Component;
use App\Models\Setting;

class ContactUs extends Component
{
    public $name, $email, $subject, $message;

    protected $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|email',
        'subject' => 'required|string|max:100',
        'message' => 'required|string|max:65100',
    ];

    public function store()
    {
        $this->validate();
        ModelsContactUs::create([
            'name' => $this->name,
            'email' => $this->email,
            'title' => $this->subject,
            'message' => $this->message
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success-message');
    }
    public function render()
    {
        $settings = Setting::find(1);
        return view('livewire.frontend.contact-us', [
            'settings' => $settings
        ])->layout('layouts.app', [
            'settings' => $settings
        ]);
    }
}
