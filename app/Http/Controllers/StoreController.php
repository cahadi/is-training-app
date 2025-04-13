<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Grade;
use App\Models\Lesson;
use App\Services\AiService;
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

        $lesson = Lesson::find($request->lesson_id);
        $aiService = new AiService();
        $result = $aiService->ans($lesson->title,  $request->body);

        $grade = Grade::where('min', '<=', $result)
            ->where('max', '>=', $result)
            ->first();

        $answer = new Answer();
        $answer->user_id = Auth::id();
        $answer->lesson_id = $request->lesson_id;
        $answer->grade_id = $grade->id;
        $answer->title = $request->title;
        $answer->body = $request->body;
        $answer->save();

        return redirect()->back()->with('status', 'answer-saved');
    }
}
