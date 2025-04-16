<?php

namespace App\Jobs;

use App\Models\Answer;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\WaitingList;
use App\Services\AiService;
use App\Services\SendRequestService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAnswer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lessonId;
    protected $title;
    protected $body;
    protected $userId;

    public function __construct($lessonId, $title, $body, $userId)
    {
        $this->lessonId = $lessonId;
        $this->title = $title;
        $this->body = $body;
        $this->userId = $userId;
    }

    public function handle()
    {
        $lesson = Lesson::find($this->lessonId);
        $service = new AiService();
        //$service = new SendRequestService();
        $result = $service->ans($lesson->title, $this->body);

        dd($result);
        $grade = Grade::where('min', '<=', $result)
            ->where('max', '>=', $result)
            ->first();

        $answer = new WaitingList();
        $answer->user_id = $this->userId;
        $answer->lesson_id = $this->lessonId;
        $answer->grade_id = $grade->id;
        $answer->title = $this->title;
        $answer->body = $this->body;
        $answer->save();
    }
}
