<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Ticket;


use App\Models\User
;
class AdminEventController extends Controller
{
    public function index(){
        return view('admin.events.index', [
            'events' =>Event::paginate(50)

        ]);
    }
    public function create(Event $events){


    return view('admin.events.create');

}
public function store(Request $request)
{
    $attributes = $request->validate([
        'title' => 'required',
        'slug' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
        'town' => 'required',
        'place' => 'required',
        'picture' => 'required|image',  // Ensure that the uploaded file is an image
        'category_id' => 'required',
    ]);

    // Set the user_id using the authenticated user's ID
    $attributes['user_id'] = auth()->id();

    // Handle image upload
    if ($request->hasFile('picture')) {
        // Store the uploaded image in the 'public/images' directory
        $imagePath = $request->file('picture')->store('public/images');
        // Generate a URL for the stored image
        $imageUrl = asset(str_replace('public/', 'storage/', $imagePath));
        $attributes['picture'] = $imageUrl;  // Store the image URL in the database
    }

    // Create a new event and save it
    Event::create($attributes);

    // Redirect to the homepage or any other desired page
    return redirect('/');
}


}

