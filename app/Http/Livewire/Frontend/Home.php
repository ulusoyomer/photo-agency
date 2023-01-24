<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Post;
use App\Models\Setting;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $settings = Setting::find(1);
        return view('livewire.frontend.home', [
            'posts' => Post::where('visibility', true)->orderBy('position', 'desc')->get(),
            'settings' => $settings
        ])->layout('layouts.app', [
            'settings' => $settings
        ]);
    }
}
