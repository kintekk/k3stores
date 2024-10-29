<?php

namespace App\Livewire\Admin;

use App\Models\homeSlider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id)
{
    // Find the HomeSlider with the given ID
    $slider = HomeSlider::find($id);

    // Check if the slider exists
    if ($slider) {
        // Optionally, delete associated files if any
        if ($slider->image) {
            Storage::disk('public')->delete('sliders/' . $slider->image);
        }

        // Delete the slider from the database
        $slider->delete();

        // Flash a success message
        session()->flash('message', 'Slide deleted successfully');
    } else {
        // Flash an error message if the slider is not found
        session()->flash('error', 'Slide not found');
    }
}

    public function render()
    {
        $sliders = homeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('components.layouts.others');
    }
}
