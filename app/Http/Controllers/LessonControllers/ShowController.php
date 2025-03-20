<?php

namespace App\Http\Controllers\LessonControllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function showAll()
    {
        $activities = Activity::all();
        return view('activity.showAll', compact('activities'));
    }
    public function showOne($id)
    {
        $activity = Activity::find($id);
        return view('activity.showOne', compact('activity'));
    }
}
