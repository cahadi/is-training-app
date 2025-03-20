<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;
use App\MoonShine\Pages\Topic\TopicIndexPage;
use App\MoonShine\Pages\Topic\TopicFormPage;
use App\MoonShine\Pages\Topic\TopicDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Topic, TopicIndexPage, TopicFormPage, TopicDetailPage>
 */
class TopicResource extends ModelResource
{
    protected string $model = Topic::class;

    protected string $title = 'Topics';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            TopicIndexPage::class,
            TopicFormPage::class,
            TopicDetailPage::class,
        ];
    }

    /**
     * @param Topic $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
