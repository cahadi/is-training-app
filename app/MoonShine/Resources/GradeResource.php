<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\MoonShine\Pages\Grade\GradeIndexPage;
use App\MoonShine\Pages\Grade\GradeFormPage;
use App\MoonShine\Pages\Grade\GradeDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Grade, GradeIndexPage, GradeFormPage, GradeDetailPage>
 */
class GradeResource extends ModelResource
{
    protected string $model = Grade::class;

    protected string $title = 'Grades';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            GradeIndexPage::class,
            GradeFormPage::class,
            GradeDetailPage::class,
        ];
    }

    /**
     * @param Grade $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
