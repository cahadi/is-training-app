<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\User;

use App\Models\Activity;
use App\Models\Role;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\Text;
use Throwable;


class UserFormPage extends FormPage
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
        $rolesArray = [];
        $roles = Role::all();
        foreach ($roles as $role) {
            $rolesArray[$role->id] = $role->title;
        }
        return [
            Text::make('Surname'),
            Text::make('Login'),
            Text::make('Password'),
            Enum::make('Activity')->options($activitiesArray),
            Enum::make('Role')->options($rolesArray),
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
