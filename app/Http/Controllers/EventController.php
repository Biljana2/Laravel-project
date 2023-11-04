<?php 
namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EventController extends Controller
{
  
     public function showEvents(Event $event) {
    $categories = Category::all();
    
    // Replace this with logic to fetch the appropriate ticket for the event
    $ticket = Ticket::where('event_id', $event->id)->first();

    return view('event', [
        'event' => $event,
        'categories' => $categories,
        'ticket' => $ticket, // Pass the $ticket variable to the view
    ]);
}
public function index(Request $request)
{
    $query = Event::latest();

    if ($request->has('category')) {
        $category = Category::where('slug', $request->input('category'))->first();
        if ($category) {
            $query->where('category_id', $category->id);
        }
    }

    if ($request->has('town')) {
        $town = $request->input('town');
        $query->where('town', $town);
    }

    if ($request->has('date_from') && $request->has('date_to')) {
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        $query->whereBetween('published_at', [$dateFrom, $dateTo]);
    }

    $events = $query->paginate(9);

    return view('events', [
        'events' => $events,
        'categories' => Category::all(),
    ]);
}


public function eventsView()
    {
        return view('events', [
            'categories' => Category::all(),
        ]);
    }
    public function getTownsByCategory($category)
{
    $towns = Event::whereHas('category', function ($query) use ($category) {
        $query->where('slug', $category);
    })->distinct()->pluck('town');

    return response()->json($towns);
}
public function showTickets($event_id)
{
     $event = Event::findOrFail($event_id); // Assuming you want to find the event by its ID
    $tickets = Ticket::where('event_id', $event->id)->where('sold', false)->get();
   


    // Pass the $event and $tickets variables to the view
    return view('buy', [
        'event' => $event,
        'tickets' => $tickets,
    ]);
}



}






