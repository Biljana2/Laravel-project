<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Category extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'name';
    }

    protected $fillable = [
        'name',
        'slug', // Add other fillable attributes here if needed
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
