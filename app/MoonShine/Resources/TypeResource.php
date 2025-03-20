<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\MoonShine\Pages\Type\TypeIndexPage;
use App\MoonShine\Pages\Type\TypeFormPage;
use App\MoonShine\Pages\Type\TypeDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Type, TypeIndexPage, TypeFormPage, TypeDetailPage>
 */
class TypeResource extends ModelResource
{
    protected string $model = Type::class;

    protected string $title = 'Types';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            TypeIndexPage::class,
            TypeFormPage::class,
            TypeDetailPage::class,
        ];
    }

    /**
     * @param Type $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
