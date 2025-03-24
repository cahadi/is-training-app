<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Lesson;

use App\Models\Activity;
use App\Models\Topic;
use App\Models\Type;
use App\MoonShine\Resources\ActivityResource;
use App\MoonShine\Resources\TopicResource;
use App\MoonShine\Resources\TypeResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
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
        return [
            ID::make(),
            Text::make('Title'),
            BelongsTo::make('Topic',
                'topic',
                'title',
                resource: TopicResource::class),
            BelongsTo::make('Type',
                'type',
                'title',
                resource: TypeResource::class),
            BelongsTo::make('Activity',
                'activity',
                'title',
                resource: ActivityResource::class)
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
