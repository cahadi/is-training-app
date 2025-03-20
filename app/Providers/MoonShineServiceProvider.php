<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\ActivityResource;
use App\MoonShine\Resources\AnswerResource;
use App\MoonShine\Resources\GradeResource;
use App\MoonShine\Resources\LessonResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\SubjectResource;
use App\MoonShine\Resources\TopicResource;
use App\MoonShine\Resources\TypeResource;
use App\MoonShine\Resources\UserResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                ActivityResource::class,
                AnswerResource::class,
                GradeResource::class,
                LessonResource::class,
                RoleResource::class,
                SubjectResource::class,
                TopicResource::class,
                TypeResource::class,
                UserResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
