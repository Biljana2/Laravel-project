<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class VideoController extends Controller
{
   public function show($video)
{
    $videoPath = storage_path('app/public/videos/' . $video);

    return response()->file($videoPath);
}
}
