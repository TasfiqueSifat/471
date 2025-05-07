<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_username',
        'receiver_username',
        'property_id',
        'message',
        'read'
    ];

    public function property()
    {
        return $this->belongsTo(AgentProperty::class, 'property_id');
    }
    
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_username', 'username');
    }
    
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_username', 'username');
    }
}