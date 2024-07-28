<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\BranchResource;
use App\MoonShine\Resources\BusinessResource;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\TypeResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [
            new BranchResource()
        ];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                )->icon('heroicons.hand-raised'),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                )->icon('heroicons.key'),
            ])->icon('heroicons.identification'),

            MenuItem::make('Usuarios', new UserResource())
                        ->icon('heroicons.user-group'),

            MenuGroup::make('Secciones', [
                MenuItem::make('Categorías', new CategoryResource())
                ->icon('heroicons.bars-4'),
                MenuItem::make('Tipos', new TypeResource())
                ->icon('heroicons.bars-3-bottom-left'),
            ])->icon('heroicons.square-3-stack-3d'),

            
           
            MenuItem::make('Negocios', new BusinessResource())
            ->icon('heroicons.building-storefront'),

            MenuItem::make('Sucursales', new BranchResource())
            ->icon('heroicons.map-pin'),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
