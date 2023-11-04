<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Ticket;

class AdminTicketController extends Controller
{
     public function index(){
    $tickets = Ticket::all(); // Retrieve the categories from your database

    return view('admin.tickets.index', [
        'tickets' => $tickets,
    ]);
}
    public function create(Ticket $ticket)
    {
         $ticket = new Ticket();

    return view('admin.tickets.create');

}
public function store(Request $request)
{
    $attributes = $request->validate([
        'event_id'=> 'required',
     
        'price'=> 'required',
        'seat_category'=> 'required',
        
        'max_no_user'=> 'required',
        'max_no' => 'required',
    ]);

    Ticket::create($attributes);

    return redirect('/');
}
public function edit(Ticket $ticket)
{
    return view('admin.tickets.edit', compact('ticket'));
}

   
public function update(Request $request, Ticket $ticket)
{

    $attributes = $request->validate([
         'event_id'=> 'required',
     
        'price'=> 'required',
        'seat_category'=> 'required',
        
        'max_no_user'=> 'required',
        'max_no' => 'required',
    ]);

    
    $ticket->update($attributes);

   return redirect()->route('admin.tickets.index')->with('success', 'Ticket has been updated');
}

 public function destroy(Ticket $ticket){

    $ticket->delete();
 return redirect()->route('admin.tickets.index')->with('success', 'Tickets has been updated');
}
 

}
