<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\BusinessResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\PromotionResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\TypeResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\Layout\Favicon;
use MoonShine\UI\Components\Layout\Footer;
use MoonShine\UI\Components\Layout\Layout;
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function getFaviconComponent(): Favicon
    {
        return parent::getFaviconComponent()->customAssets([
            'apple-touch' => '/icon.svg',
            '32' => '/icon.svg',
            '16' => '/icon.svg',
            'safari-pinned-tab' => '/icon.svg',
            'web-manifest' => '/icon.svg',
        ]);
    }

    protected function getFooterComponent(): Footer
    {
        return Footer::make()->copyright(fn (): string => 'PROMOZIONI');
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make('system', [
                MenuItem::make('admins_title', UserResource::class)
                    ->translatable('moonshine::ui.resource'),

                MenuItem::make('role', RoleResource::class)
                    ->translatable('moonshine::ui.resource'),

                // MenuItem::make('permissions',  PermissionResource::class)
                //     ->translatable('moonshine-rbac::ui')
                //     ->icon('s.shield-check'),
            ], 'm.cube')->translatable('moonshine::ui.resource'),

            MenuGroup::make('Clasificación', [
                MenuItem::make('Categorías', CategoryResource::class),
                MenuItem::make('Tipos', TypeResource::class),
            ], 's.rectangle-stack'),

            MenuGroup::make('Negocios', [
                MenuItem::make('Negocios', BusinessResource::class),
                MenuItem::make('Promociones', PromotionResource::class),
            ], 's.building-office'),

        ];
    }

    /**
     * @param  ColorManager  $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        // parent::colors($colorManager);
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
