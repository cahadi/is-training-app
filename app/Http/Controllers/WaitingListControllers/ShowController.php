<?php

namespace App\Http\Controllers\WaitingListControllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Grade;
use App\Models\WaitingList;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show()
    {
        $waitList = WaitingList::simplePaginate(1);
        return view('frontend.waiting.show', compact('waitList'));
    }

    public function evaluateForm($id)
    {
        $wait = WaitingList::find($id);
        return view('frontend.forms.evaluateform', compact('wait'));
    }

    public function evaluate(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user,id',
            'lesson_id' => 'required|exists:lessons,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'grade' => 'required|integer'
        ]);

        $grade = Grade::where('min', '<=', $request->grade)
            ->where('max', '>=', $request->grade)
            ->first();

        $answer = new Answer();
        $answer->user_id = $request->user_id;
        $answer->lesson_id = $request->lesson_id;
        $answer->grade_id = $grade->id;
        $answer->title = $request->title;
        $answer->body = $request->body;
        $answer->save();
    }
}
