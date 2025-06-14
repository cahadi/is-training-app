<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\MoonShine\Pages\Subject\SubjectIndexPage;
use App\MoonShine\Pages\Subject\SubjectFormPage;
use App\MoonShine\Pages\Subject\SubjectDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Subject, SubjectIndexPage, SubjectFormPage, SubjectDetailPage>
 */
class SubjectResource extends ModelResource
{
    protected string $model = Subject::class;

    protected string $title = 'Subjects';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            SubjectIndexPage::class,
            SubjectFormPage::class,
            SubjectDetailPage::class,
        ];
    }

    /**
     * @param Subject $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
