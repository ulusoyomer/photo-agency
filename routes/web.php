<?php

use App\Http\Livewire\Admin\AddPost;
use App\Http\Livewire\Admin\AdminSettings;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\CreateAdmin;
use App\Http\Livewire\Admin\EditPost;
use App\Http\Livewire\Admin\LoginAdmin;
use App\Http\Livewire\Admin\PostsPage;
use App\Http\Livewire\Admin\SendMessage;
use App\Http\Livewire\Frontend\AboutUs;
use App\Http\Livewire\Frontend\ContactUs;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\NotFound;
use App\Http\Livewire\Frontend\Post;

Route::get('/', Home::class)->name('home');
Route::get('/post/{slug}', Post::class)->name('post');
Route::get('/about', AboutUs::class)->name('about');
Route::get('/contact', ContactUs::class)->name('contact');
Route::get('/404', NotFound::class)->name('404');


Route::get('/admin', LoginAdmin::class)->name('admin.login')->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', PostsPage::class)->name('admin.home');
    Route::get('/admin/post', AddPost::class)->name('admin.post');
    Route::get('/admin/settings', AdminSettings::class)->name('admin.settings');
    Route::get('/admin/edit/{post_id}', EditPost::class)->name('admin.edit');
    Route::get('/admin/logout', [LoginAdmin::class, 'logout'])->name('admin.logout');
    Route::get('/admin/register', CreateAdmin::class)->name('admin.register');
    Route::get('/admin/contact', SendMessage::class)->name('admin.message');
});
