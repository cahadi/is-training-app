<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\MoonShine\Pages\Lesson\LessonIndexPage;
use App\MoonShine\Pages\Lesson\LessonFormPage;
use App\MoonShine\Pages\Lesson\LessonDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Lesson, LessonIndexPage, LessonFormPage, LessonDetailPage>
 */
class LessonResource extends ModelResource
{
    protected string $model = Lesson::class;

    protected string $title = 'Lessons';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            LessonIndexPage::class,
            LessonFormPage::class,
            LessonDetailPage::class,
        ];
    }

    /**
     * @param Lesson $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
