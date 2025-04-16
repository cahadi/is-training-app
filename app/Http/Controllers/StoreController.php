<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessAnswer;
use App\Models\WaitingList;
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


        $answer = new WaitingList();
        $answer->user_id = Auth::id();
        $answer->lesson_id = $request->lesson_id;
        $answer->answer_title = $request->title;
        $answer->answer_body = $request->body;
        $answer->save();

        return redirect()->back()->with('status', 'answer-saved');
    }
}
