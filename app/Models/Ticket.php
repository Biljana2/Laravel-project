<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
     
        'price',
        'seat_category',
        
        'max_no_user',
        'max_no',
    
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
