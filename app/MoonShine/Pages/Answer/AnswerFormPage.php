<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Answer;

use App\MoonShine\Resources\GradeResource;
use App\MoonShine\Resources\LessonResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Fields\Text;
use Throwable;


class AnswerFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make('Title'),
            BelongsTo::make('User',
                'user',
                'surname',
                resource: UserResource::class),
            BelongsTo::make('Grade',
                'grade',
                'rating',
                resource: GradeResource::class),
            BelongsTo::make('Lesson',
                'lesson',
                'title',
                resource: LessonResource::class),
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
