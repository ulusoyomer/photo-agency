<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PostsPage extends Component
{
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

    public function edit($post_id)
    {
        return redirect()->route('admin.edit', [$post_id]);
    }

    public function delete($post_id)
    {
        $post_images = PostImage::select('image')->where('post_id', $post_id)->get();
        foreach ($post_images as $image) {
            if (Storage::exists("public" . $image->image)) {
                Storage::delete("public" . $image->image);
            }
        }
        PostImage::where('post_id', $post_id)->delete();
        Post::destroy($post_id);
        $this->sortAllPost();
        session()->flash('message', 'İçerik Silindi');
        return redirect()->route('admin.home');
    }

    private function sortAllPost()
    {
        $posts = Post::orderBy('position')->get();
        foreach ($posts as $key => $post) {
            $post->position = $key + 1;
            $post->save();
        }
    }

    public function updateTaskOrder($items)
    {
        $posts = Post::orderBy('position')->get();
        foreach ($items as $item) {
            $posts[intval($item['value']) - 1]->position = $item['order'];
            $posts[intval($item['value']) - 1]->save();
        }
    }

    public function hideShow($post_id)
    {
        $post = Post::find($post_id);
        $visibility = $post->visibility > 0 ? 0 : 1;
        $post->visibility = $visibility;
        $post->save();
        session()->flash('message', 'Güncelleme Yapıldı');
        return redirect()->route('admin.home');
    }

    public function render()
    {
        return view('livewire.admin.posts-page', [
            'posts' => Post::orderBy('position')->get()
        ])->layout('layouts.admin');
    }
}
