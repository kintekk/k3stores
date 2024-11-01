<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_attribute_id',
    ];
    public function ProductAttribute()
    {
        return $this->belongsTo(ProductAttribute::class ,'product_attribute_id');
    }
}
