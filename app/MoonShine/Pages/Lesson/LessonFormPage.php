<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Lesson;

use App\Models\Activity;
use App\Models\Topic;
use App\Models\Type;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use Throwable;


class LessonFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        $topicsArray = [];
        $typesArray = [];
        $activitiesArray = [];
        $topics = Topic::all();
        foreach ($topics as $topic) {
            $topicsArray[$topic->id] = $topic->title;
        }
        $types = Type::all();
        foreach ($types as $type) {
            $typesArray[$type->id] = $type->title;
        }
        $activities = Activity::all();
        foreach ($activities as $activity) {
            $activitiesArray[$activity->id] = $activity->title;
        }

        return [
            ID::make(),
            Text::make('Title'),
            Enum::make('Topic')->options($topicsArray),
            Enum::make('Type')->options($typesArray),
            Enum::make('Activity')->options($activitiesArray),
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
