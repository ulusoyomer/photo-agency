<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Post as ModelsPost;
use Livewire\Component;
use App\Models\Setting;
use Auth;
use Illuminate\Support\Facades\Route;

class Post extends Component
{

    public $post_slug, $post, $current_images;

    public function render()
    {
        $settings = Setting::find(1);
        return view('livewire.frontend.post')->layout('layouts.app', [
            'settings' => $settings
        ]);
    }

    public function mount()
    {
        $this->post_slug = Route::current()->parameter('slug');
        $this->post = ModelsPost::where('slug', $this->post_slug)->first();
        if (!$this->post)
            return redirect()->route('home');
        if (!$this->post->visibility && Auth::guest()) {
            return redirect()->route('home');
        }
        $this->current_images = $this->post->post_images()->orderBy('position')->get();
    }
}
