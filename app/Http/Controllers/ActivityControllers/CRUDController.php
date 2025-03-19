<?php

namespace App\Http\Controllers\ActivityControllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class CRUDController extends Controller
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
    public function create(Request $request)
    {

    }
    public function update(Request $request)
    {

    }
    public function delete(Request $request)
    {

    }
}
