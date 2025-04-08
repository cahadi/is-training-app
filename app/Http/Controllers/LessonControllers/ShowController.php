<?php

namespace App\Http\Controllers\LessonControllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Subject;

class ShowController extends Controller
{
    public function showOne($title)
    {
        $subjects = Subject::all();
        $lesson = Lesson::where('title', $title)->first();
        $answer = Answer::where('lesson_id', $lesson->id)->first();
        $previous = Answer::where('id', $answer->id - 1)->first();
        $next = Answer::where('id', $answer->id + 1)->first();
        //dd($answer->title);
        $prac = null;
        if(strpos($answer->title, 'Лекция ') === 0)
            $prac = true;
        //dd($prac);
        return view('frontend.pages.lesson', compact('answer',
            'subjects', 'previous', 'next', 'prac'));
    }
}
