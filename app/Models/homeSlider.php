<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class homeSlider extends Model
{
    use HasFactory;
    protected $table ="home_sliders";

    // In HomeSlider model (HomeSlider.php)
// public function getImageUrlAttribute()
// {
//     return Storage::disk('s3')->url($this->image);
// }
}
