<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric', // Adjust validation as needed
        'comment' => 'required|string',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }

    public function sendMessage()
    {
        $this->validate($this->rules);

        try {
            $contact = new Contact();
            $contact->name = $this->name;
            $contact->email = $this->email;
            $contact->phone = $this->phone;
            $contact->comment = $this->comment;
            $contact->save();

            // Optionally, reset form fields after saving
            $this->reset(['name', 'email', 'phone', 'comment']);

            session()->flash('message', 'Thanks for messaging us, you will get a response soon.');
        } catch (\Exception $e) {
            // Log the exception and optionally notify the user
            \Log::error('Error saving contact message: ' . $e->getMessage());
            session()->flash('error', 'There was an error processing your message. Please try again later.');
        }
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.contact-component',['setting'=>$setting])->layout('components.layouts.others');
    }
}
