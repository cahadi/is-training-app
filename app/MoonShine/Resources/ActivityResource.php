<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;
use App\MoonShine\Pages\Activity\ActivityIndexPage;
use App\MoonShine\Pages\Activity\ActivityFormPage;
use App\MoonShine\Pages\Activity\ActivityDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Activity, ActivityIndexPage, ActivityFormPage, ActivityDetailPage>
 */
class ActivityResource extends ModelResource
{
    protected string $model = Activity::class;

    protected string $title = 'Activities';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            ActivityIndexPage::class,
            ActivityFormPage::class,
            ActivityDetailPage::class,
        ];
    }

    /**
     * @param Activity $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
