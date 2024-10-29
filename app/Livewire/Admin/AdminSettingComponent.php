<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twitter;
    public $facebook;
    public $pinterest;
    public $instagram;
    public $youtube;

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->twitter = $setting->twitter;
            $this->facebook = $setting->facebook;
            $this->pinterest = $setting->pinterest;
            $this->instagram = $setting->instagram;
            $this->youtube = $setting->youtube;
        }
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'pinterest' => 'required',
            'instagram' => 'required',
            'youtube' => 'required'
        ];
    }

    public function saveSettings()
    {
        $this->validate();

        try {
            $setting = Setting::find(1);
            if (!$setting) {
                $setting = new Setting();
            }

            $setting->email = $this->email;
            $setting->phone = $this->phone;
            $setting->phone2 = $this->phone2;
            $setting->address = $this->address;
            $setting->map = $this->map;
            $setting->twitter = $this->twitter;
            $setting->facebook = $this->facebook;
            $setting->pinterest = $this->pinterest;
            $setting->instagram = $this->instagram;
            $setting->youtube = $this->youtube;
            $setting->save();

            session()->flash('message', 'Settings have been saved successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving settings: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('components.layouts.others');
    }
}
