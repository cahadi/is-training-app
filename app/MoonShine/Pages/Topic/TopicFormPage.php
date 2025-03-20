<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Topic;

use App\Models\Activity;
use App\Models\Subject;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\Text;
use Throwable;


class TopicFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        #Лучше этого, способ пока не найден
        $activities = Activity::all();
        $activitiesArray = [];
        $subjectsArray = [];
        $subjects = Subject::all();
        foreach ($activities as $activity) {
            $activitiesArray[$activity->id] = $activity->title;
        }
        foreach ($subjects as $subject) {
            $subjectsArray[$subject->id] = $subject->title;
        }
        return [
            Text::make('Title'),
            Enum::make('Activity')->options($activitiesArray),
            Enum::make('Subject')->options($subjectsArray)
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
