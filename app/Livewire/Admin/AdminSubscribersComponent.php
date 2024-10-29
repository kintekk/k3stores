<?php

namespace App\Livewire\Admin;

use App\Models\Subscriber;
use Livewire\Component;

class AdminSubscribersComponent extends Component
{
    public function remove($id)
    {
        try {
            // Attempt to find the subscriber by ID
            $sub = Subscriber::find($id);

            // Check if the subscriber exists
            if ($sub) {
                // Delete the subscriber
                $sub->delete();
                session()->flash('message', 'Subscriber successfully removed');
            } else {
                // Handle the case where the subscriber was not found
                session()->flash('error', 'Subscriber not found');
            }
        } catch (\Exception $e) {
            // Handle any unexpected errors
            session()->flash('error', 'Error removing subscriber: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $subscribers = Subscriber::all();
        return view('livewire.admin.admin-subscribers-component',['subscribers'=>$subscribers])->layout('components.layouts.others');
    }
}
