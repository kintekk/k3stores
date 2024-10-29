<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contacts = Contact::paginate(12);
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('components.layouts.others');
    }
}
