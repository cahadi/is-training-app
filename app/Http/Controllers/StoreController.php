<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        ProcessAnswer::dispatch($request->lesson_id, $request->title, $request->body, Auth::id())
            ->delay(now()->addMinutes(0));

        return redirect()->back()->with('status', 'answer-saved');
    }
}
