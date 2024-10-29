<?php

namespace App\Livewire\Admin;

use App\Models\homeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0; // Initialize status to default
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'subtitle' => 'required|unique:home_sliders,subtitle', // Validate subtitle uniqueness
            'price' => 'required|numeric', // Ensure price is numeric
            'link' => 'required|url', // Validate link as a URL
            'image' => 'required|image|mimes:jpeg,png,jpg', // Validate image format
        ]);
    }

    public function addSlide()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required|unique:home_sliders,subtitle', // Validate subtitle uniqueness
            'price' => 'required|numeric', // Ensure price is numeric
            'link' => 'required|url', // Validate link as a URL
            'image' => 'required|image|mimes:jpeg,png,jpg', // Validate image format
        ]);

        try {
            $slider = new homeSlider();
            $slider->title = $this->title;
            $slider->subtitle = $this->subtitle;
            $slider->price = $this->price;
            $slider->link = $this->link;

            // Generate image name
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();

            // Store image
            $this->image->storeAs('sliders', $imageName, 'public'); // Ensure disk is configured correctly

            $slider->image = $imageName;
            $slider->status = $this->status;
            $slider->save();

            session()->flash('message', 'Slide has been created successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error creating the slide. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('components.layouts.others');
    }
}
