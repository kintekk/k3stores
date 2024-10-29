<?php

namespace App\Livewire\Admin;

use App\Models\homeSlider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slide_id)
    {
        $slider = HomeSlider::find($slide_id);

        if ($slider) {
            $this->slider_id = $slider->id;
            $this->title = $slider->title;
            $this->subtitle = $slider->subtitle;
            $this->price = $slider->price;
            $this->link = $slider->link;
            $this->image = $slider->image;
            $this->status = $slider->status;
        } else {
            session()->flash('error', 'Slide not found');
            return redirect()->route('admin.sliders'); // Redirect to a list or a different page
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'subtitle' => 'required|unique:home_sliders,subtitle,' . $this->slider_id,
            'price' => 'required|numeric',
            'link' => 'required|url',
            'newimage' => 'nullable|image|mimes:jpeg,png',
        ]);
    }

    public function updateslide()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required|unique:home_sliders,subtitle,' . $this->slider_id,
            'price' => 'required|numeric',
            'link' => 'required|url',
            'newimage' => 'nullable|image|mimes:jpeg,png',
        ]);

        $slider = homeSlider::find($this->slider_id);

        if ($slider) {
            $slider->title = $this->title;
            $slider->subtitle = $this->subtitle;
            $slider->price = $this->price;
            $slider->link = $this->link;

            if ($this->newimage) {
                // Delete old image if exists
                if ($slider->image) {
                    Storage::disk('public')->delete('sliders/' . $slider->image);
                }

                // Store new image
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('sliders', $imageName, 'public');
                $slider->image = $imageName;
            }

            $slider->status = $this->status;
            $slider->save();

            session()->flash('message', 'Slide updated successfully!');
        } else {
            session()->flash('error', 'Slide not found');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('components.layouts.others');
    }
}
