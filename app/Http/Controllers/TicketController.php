<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use App\Models\PurchasedTickets;

class TicketController extends Controller
{
   
public function purchaseTicket(Request $request)
    {
        $event = Event::findOrFail($request->input('event_id'));
        $ticket = Ticket::findOrFail($request->input('ticket_id'));
        $quantity = (int) $request->input('ticket_quantity');
        $user = auth()->user(); // Assuming the user is logged in

        // Check if there are enough available tickets
        if ($quantity > $ticket->max_no_user) {
            return redirect()->back()->with('error', 'Not enough available tickets.');
        }

        // Calculate the new available tickets quantity
        $newAvailableTickets = $ticket->max_no_user - $quantity;

        // Update the ticket's available quantity
        $ticket->update(['max_no_user' => $newAvailableTickets]);

        // Create a new PurchasedTickets instance
        $purchasedTickets = new PurchasedTickets();
        $purchasedTickets->ticket_id = $ticket->id;
        $purchasedTickets->event_id = $event->id;
        $purchasedTickets->user_id = $user->id;
        $purchasedTickets->sold = $quantity;
        $purchasedTickets->save();

        // Redirect to a page that shows the purchase information
        return view('purchaseTickets', compact('event', 'ticket'));
    }

public function showTickets($event_id)
{
    $event = Event::findOrFail($event_id);
    
    // Fetch the tickets with their associated max_no_user values
    $tickets = Ticket::where('event_id', $event->id)
        ->whereHas('event', function ($query) use ($event) {
            $query->where('id', $event->id);
        })
        ->get();

    return view('buy', compact('event', 'tickets'));
}

}