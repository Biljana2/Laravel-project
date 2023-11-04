<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PurchasedTickets;
use App\Models\Ticket; // Use the correct namespace
use App\Models\Event;  // Use the correct namespace
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PurchasedTicketsController extends Controller
{
    public function store(Request $request)
{
    $event = Event::findOrFail($request->input('event_id'));
    $ticket = Ticket::findOrFail($request->input('ticket_id'));
    $quantity = (int) $request->input('ticket_quantity');
    $user = auth()->user();

    // Calculate the number of tickets left
    $maxNo = (int) $ticket->max_no;
    $soldTickets = PurchasedTickets::where('ticket_id', $ticket->id)->sum('sold');
    $availableTickets = $maxNo - $soldTickets;

    // Check if there are enough available tickets
    if ($quantity > $availableTickets) {
        return redirect()->back()->with('error', 'Not enough available tickets.');
    }

    // Create a new PurchasedTicket instance and store it in the database
    PurchasedTickets::create([
        'ticket_id' => $ticket->id,
        'event_id' => $event->id,
        'user_id' => $user->id,
        'sold' => $quantity,
    ]);

    // Calculate the userPurchaseCount here
    $userPurchaseCount = PurchasedTickets::where('event_id', $event->id)
        ->where('user_id', $user->id)
        ->sum('sold');

    return view('purchaseTickets', compact('event', 'ticket', 'userPurchaseCount'));
}
}
