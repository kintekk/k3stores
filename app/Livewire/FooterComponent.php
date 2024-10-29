<?php

namespace App\Livewire;

use App\Mail\SubscriberMail;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FooterComponent extends Component
{
    public $email;

    // Validation rules
    protected $rules = [
        'email' => 'required|email|unique:subscribers,email'
    ];

    // Validate specific fields on input change
    public function update($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }

    // Handle subscription
    public function subscriber()
    {
        $this->validate();

        // Create and save subscriber
        $subscriber = new Subscriber(); // Ensure the correct model name
        $subscriber->email = $this->email;
        $subscriber->save();

        // Flash message and send confirmation mail
        session()->flash('message', 'Thank you for subscribing to our newsletter');
        $this->sendSubscriberConfirmationMail($subscriber);

        // Clear email field after submission
        $this->reset('email');
    }

    // Send confirmation mail
    protected function sendSubscriberConfirmationMail($subscriber)
    {
        Mail::to($subscriber->email)->send(new SubscriberMail($subscriber));
    }

    // Render method
    public function render()
    {
        $categories = Category::all();
        $setting = Setting::find(1);
        return view('livewire.footer-component', [
            'settings' => $setting,
            'categories' => $categories
        ]);
    }
}
