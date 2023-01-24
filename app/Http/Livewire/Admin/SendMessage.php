<?php

namespace App\Http\Livewire\Admin;

use App\Mail\SupportEmail;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class SendMessage extends Component
{

    public $message;

    public function send($email, $name, $id)
    {
        if ($this->message && $email && $name && $id) {
            $mailData = [
                'name' => $name,
                'body' => $this->message
            ];
            Mail::to($email)->send(new SupportEmail($mailData));
            $contact = ContactUs::find($id);
            $contact->read = true;
            $contact->save();
            return redirect()->route('admin.message');
        }
    }

    public function clear()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.send-message', [
            'messages' => ContactUs::orderBy('id', 'desc')->get()
        ])->layout('layouts.admin');
    }
}
