<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Role;

use App\Models\Activity;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\Text;
use Throwable;


class RoleFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        $activitiesArray = [];
        $activities = Activity::all();
        foreach ($activities as $activity) {
            $activitiesArray[$activity->id] = $activity->title;
        }
        return [
            Text::make('Title'),
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
