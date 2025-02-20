<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\BusinessResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\PromotionResource;
use App\MoonShine\Resources\RatingResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\TypeResource;
use App\MoonShine\Resources\UserResource;
use App\Services\ThemeApplier;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     */
    public function boot(
        CoreContract $core,
        ConfiguratorContract $config,
        ColorManagerContract $colorManager
    ): void {
        // $config->authEnable();

        (new ThemeApplier($colorManager))->theme3();

        $core
            ->resources([
                UserResource::class,
                RoleResource::class,
                PermissionResource::class,
                CategoryResource::class,
                TypeResource::class,
                BusinessResource::class,
                RatingResource::class,
                PromotionResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ]);
    }
}
