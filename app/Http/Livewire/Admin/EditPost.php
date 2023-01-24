<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\PostImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class EditPost extends Component
{
    use WithFileUploads;
    public $post_id;
    public $title, $content;
    public $images = [];

    protected function rules()
    {
        return [
            'title' => ['required', Rule::unique('posts')->ignore($this->post_id), 'min:3'],
            'images' => ['max:5'],
            'images.*' => ['image', 'max:1024'],
        ];
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
    }

    public function removePostImage($position)
    {
        $post_images = PostImage::where('post_id', $this->post_id)->orderBy('position')->get();
        if (Storage::exists("public" . $post_images[$position - 1]->image)) {
            Storage::delete("public" . $post_images[$position - 1]->image);
        }
        $post_images[$position - 1]->delete();
        $post_images->splice($position - 1, 1);
        foreach ($post_images as $key => $post_image) {
            $post_image->position = $key + 1;
            $post_image->save();
        }
        return redirect(request()->header('Referer'));
    }

    public function mount()
    {
        $this->post_id = Route::current()->parameter('post_id');
        $post = Post::find($this->post_id);
        $this->title = $post->title;
        $this->content = $post->content;
        $this->current_images = $post->post_images()->orderBy('position')->get();
    }

    public function updateTaskOrder($items)
    {
        foreach ($items as $item) {
            $this->current_images[intval($item['value']) - 1]->position = $item['order'];
            $this->current_images[intval($item['value']) - 1]->save();
        }
    }

    public function update()
    {
        $this->validate();
        $post = Post::find($this->post_id);
        $slug = Str::slug($this->title);
        $post->update([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $slug
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
        session()->flash('message', 'İçerik Güncellendi');
        return redirect()->route('admin.home');
    }

    public function render()
    {
        return view('livewire.admin.edit-post')->layout('layouts.admin');
    }
}
