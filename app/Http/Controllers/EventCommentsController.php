<?php 

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventCommentsController extends Controller
{
    public function store(Event $event)
    {
        $data = request()->validate([
            'body' => 'required'
        ]);

        $data['user_id'] = request()->user()->id;

        $event->comments()->create($data);

        return back();
    }
}
