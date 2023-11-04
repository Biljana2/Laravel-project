<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Ticket;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request; // Import the Request class

class PurchasedTickets extends Model
{
    use HasFactory;

    protected $table = 'purchase_ticket';
    protected $fillable = ['ticket_id', 'event_id', 'user_id', 'sold'];

   }