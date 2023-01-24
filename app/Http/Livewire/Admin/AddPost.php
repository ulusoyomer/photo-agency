<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddPost extends Component
{
    use WithFileUploads;

    public $title, $content;
    public $images = [];

    protected $rules = [
        'title' => 'required|unique:posts|min:3',
        'images' => 'max:5',
        'images.*' => 'image|max:1024',
    ];

    public function removeImage($index)
    {
        unset($this->images[$index]);
    }

    public function store()
    {
        $this->validate();
        $slug = Str::slug($this->title);
        $position = Post::count() + 1;
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $slug,
            'position' => $position
        ]);
        foreach ($this->images as $image) {
            $real_image = $image->store('public/images');
            $real_image = explode("public", $real_image);
            PostImage::create([
                'post_id' => $post->id,
                'image' => $real_image[1],
                'position' => PostImage::where('post_id', $post->id)->count() + 1
            ]);
        }
        session()->flash('message', 'İçerik Eklendi');
        return redirect()->route('admin.home');
    }


    public function render()
    {
        return view('livewire.admin.add-post')->layout('layouts.admin');
    }
}
