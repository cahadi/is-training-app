<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Answer;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\User;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\Text;
use Throwable;


class AnswerFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        $usersArray = [];
        $users = User::all();
        foreach ($users as $user) {
            $usersArray[$user->id] = $user->title;
        }
        $gradesArray = [];
        $grades = Grade::all();
        foreach ($grades as $grade) {
            $gradesArray[$grade->id] = $grade->title;
        }
        $lessonsArray = [];
        $lessons = Lesson::all();
        foreach ($lessons as $lesson) {
            $lessonsArray[$lesson->id] = $lesson->title;
        }
        return [
            Text::make('Title'),
            Enum::make('User')->options($usersArray),
            Enum::make('Grade')->options($gradesArray),
            Enum::make('Lesson')->options($lessonsArray),
            Text::make('Body'),
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
