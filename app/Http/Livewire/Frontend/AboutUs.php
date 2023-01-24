<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class AboutUs extends Component
{
    public function render()
    {
        $settings = Setting::find(1);
        return view('livewire.frontend.about-us', [
            'settings' => $settings
        ])->layout('layouts.app', [
            'settings' => $settings
        ]);
    }
}
