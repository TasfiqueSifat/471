<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentProperty extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'username',
        'property_name',
        'bedroom',
        'bathroom',
        'address',
        'other_details',
        'price',
        'status',
        'image_path',
        'property_type',
        'sale_or_rent',
    ];

    public function reviews()
    {
        return $this->hasMany(PropertyReview::class, 'property_id');
    }
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'property_id');
    }
}