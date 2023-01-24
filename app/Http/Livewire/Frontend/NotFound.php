<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class NotFound extends Component
{
    public function render()
    {
        $settings = Setting::find(1);
        return view('livewire.frontend.not-found')->layout('layouts.app', [
            'settings' => $settings
        ]);
    }
}
