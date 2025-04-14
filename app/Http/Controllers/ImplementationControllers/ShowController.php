<?php

namespace App\Http\Controllers\ImplementationControllers;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Topic;
use App\Services\GeneratePassword;

class ShowController extends Controller
{
    public function show($topicId = null)
    {
        $perPage = 1;

        $topics = null;
        $lastLessonId=null;

        $subject = Subject::where('id', 1)->first();
        if($topicId == null)
        {
            $lessons = Lesson::all()->where('topic_id', 1);
            $topics = Topic::where('subject_id', 1)->simplePaginate($perPage, ['*'], 'topics');
        }
        else
        {
            if($topicId >=4)
            {

                $subject = Subject::where('id', 2)->first();
            }
            $lessons = Lesson::all()->where('topic_id', $topicId);
            $topics = Topic::where('id', $topicId)->simplePaginate($perPage, ['*'], 'topics');
        }

        foreach ($topics as $topic) {
            $topic->lessons = $topic->lessons()->simplePaginate($perPage, ['*'], 'lessons_' . $topic->id);
            foreach ($topic->lessons as $lesson) {
                $lesson->answers = $lesson->answers()->where('user_id', 1)->simplePaginate($perPage, ['*'], 'answers_' . $lesson->id);
            }
        }
        $lastLessonId = $lessons->last();
        $lastLessonId = $lastLessonId->id;
        if($topicId < 4)
        {
            return view('frontend.implementation.show', compact('subject', 'topics', 'lastLessonId'));
        }
        else
        {
            return view('frontend.functioning.show', compact('subject', 'topics', 'lastLessonId'));
        }
    }
}
