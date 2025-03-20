<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use App\MoonShine\Resources\ActivityResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\AnswerResource;
use App\MoonShine\Resources\GradeResource;
use App\MoonShine\Resources\LessonResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\SubjectResource;
use App\MoonShine\Resources\TopicResource;
use App\MoonShine\Resources\TypeResource;
use App\MoonShine\Resources\UserResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make('Activities', ActivityResource::class),
            MenuItem::make('Answers', AnswerResource::class),
            MenuItem::make('Grades', GradeResource::class),
            MenuItem::make('Lessons', LessonResource::class),
            MenuItem::make('Roles', RoleResource::class),
            MenuItem::make('Subjects', SubjectResource::class),
            MenuItem::make('Topics', TopicResource::class),
            MenuItem::make('Types', TypeResource::class),
            MenuItem::make('Users', UserResource::class),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
