<?php
// app/Models/PropertyReview.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'user_id',
        'review_text',
        'username'
    ];

    public function property()
    {
        return $this->belongsTo(AgentProperty::class, 'property_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}