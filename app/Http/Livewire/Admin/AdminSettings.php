<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminSettings extends Component
{
    use WithFileUploads;
    public $mainImage, $title, $twitter, $facebook, $instagram, $linkedin, $youtube, $footer, $mtitle, $mcontent;
    public $aboutImage, $atitle, $atext, $address, $email, $call, $googleMap;


    protected $rules = [
        'mainImage' => 'nullable|image|max:1024',
        'title' => 'nullable|string',
        'twitter' => 'nullable|url',
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'youtube' => 'nullable|url',
        'footer' => 'nullable|string',
        'mtitle' => 'nullable|string',
        'mcontent' => 'nullable',
        'aboutImage' => 'nullable|image|max:1024',
        'atitle' => 'nullable|string',
        'atext' => 'nullable',
        'address' => 'nullable',
        'email' => 'nullable|email',
        'call' => 'nullable|string',
        'googleMap' => 'nullable',
    ];

    public function mount()
    {
        $setting = Setting::find(1);
        $this->title = $setting->title;
        $this->twitter = $setting->twitter;
        $this->facebook = $setting->facebook;
        $this->instagram = $setting->instagram;
        $this->linkedin = $setting->linkedin;
        $this->youtube = $setting->youtube;
        $this->footer = $setting->footer;
        $this->mtitle = $setting->home_title;
        $this->mcontent = $setting->home_text;
        $this->atitle = $setting->about_us_title;
        $this->atext = $setting->about_us_text;
        $this->address = $setting->address;
        $this->email = $setting->email;
        $this->call = $setting->phone;
        $this->googleMap = $setting->map;
    }

    public function store()
    {
        $this->validate();

        $setting = Setting::find(1);
        $setting->update([
            'title' => $this->title,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'youtube' => $this->youtube,
            'footer' => $this->footer,
            'home_title' => $this->mtitle,
            'home_text' => $this->mcontent,
            'about_us_title' => $this->atitle,
            'about_us_text' => $this->atext,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->call,
            'map' => $this->googleMap,
        ]);
        if ($this->mainImage) {
            $main_image = $this->mainImage->store('public/settings');
            $main_image = explode('public', $main_image)[1];

            $setting->update([
                'site_image' => $main_image,
            ]);
        }
        if ($this->aboutImage) {
            $about_image = $this->aboutImage->store('public/settings');
            $about_image = explode('public', $about_image)[1];

            $setting->update([
                'about_us_image' => $about_image
            ]);
        }
        if ($setting) {
            session()->flash('message', 'Güncelleme Yapıldı');
            return redirect()->route('admin.settings');
        } else {
            session()->flash('message_error', 'Güncelleme Yapılamadı');
            return redirect()->route('admin.settings');
        }
    }

    public function removeSiteImage()
    {
        $settings = Setting::find(1);
        if (Storage::exists("public" . $settings->site_image)) {
            Storage::delete("public" . $settings->site_image);
            $settings->update([
                'site_image' => null
            ]);
            session()->flash('message', 'Site Resmi Silindi');
            return redirect()->route('admin.settings');
        }
    }

    public function removeAboutImage()
    {
        $settings = Setting::find(1);
        if (Storage::exists("public" . $settings->about_us_image)) {
            Storage::delete("public" . $settings->about_us_image);
            $settings->update([
                'about_us_image' => null
            ]);
            session()->flash('message', 'Hakkımızda Resmi Silindi');
            return redirect()->route('admin.settings');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-settings', [
            'settings' => Setting::select('site_image', 'about_us_image')->find(1)
        ])->layout('layouts.admin');
    }
}
