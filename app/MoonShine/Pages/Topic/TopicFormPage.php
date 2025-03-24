<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Topic;

use App\Models\Activity;
use App\Models\Subject;
use App\MoonShine\Resources\ActivityResource;
use App\MoonShine\Resources\SubjectResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
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
        return [
            Text::make('Title'),
            BelongsTo::make('Activity',
                'activity',
                'title',
                resource: ActivityResource::class),
            BelongsTo::make('Subject',
                'subject',
                'title',
                resource: SubjectResource::class)
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
