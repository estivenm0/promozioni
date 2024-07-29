<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Branch;
use App\Models\Business;
use App\Models\Category;
use App\Models\User;
use App\Models\Type;
use App\Models\Rating;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Grid;
use MoonShine\Metrics\ValueMetric;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Panel';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            Grid::make([
               
                ValueMetric::make('Administradores')
                    ->value(DB::table('moonshine_users')->count())
                    ->icon('heroicons.user-group')
                    ->columnSpan(3),

                ValueMetric::make('Roles')
                    ->value(DB::table('moonshine_user_roles')->count())
                    ->icon('heroicons.shield-exclamation')
                    ->columnSpan(3),

                ValueMetric::make('Users')
                    ->value(User::count())
                    ->icon('heroicons.user-group')
                    ->columnSpan(3),

                    ValueMetric::make('Tipos')
                    ->value(Type::count())
                    ->icon('heroicons.bars-3-bottom-left')
                    ->columnSpan(3),

                ValueMetric::make('Categorias')
                    ->value(Category::count())
                    ->icon('heroicons.bars-4')
                    ->columnSpan(3),

                ValueMetric::make('Negocios')
                    ->value(Business::count())
                    ->icon('heroicons.building-storefront')
                    ->columnSpan(3),
                    
                ValueMetric::make('Sucursales')
                    ->value(Branch::count())
                    ->icon('heroicons.map-pin')
                    ->columnSpan(3),

                ValueMetric::make('Sucursales Pendientes')
                    ->value(Branch::where('status', 'pendiente')->count())
                    ->icon('heroicons.stop-circle')
                    ->columnSpan(3),

                ValueMetric::make('Sucursales Rechazadas')
                    ->value(Branch::where('status', 'rechazado')->count())
                    ->icon('heroicons.x-circle')
                    ->columnSpan(3),

                ValueMetric::make('Sucursales Aprobadas')
                    ->value(Branch::where('status', 'aprobado')->count())
                    ->icon('heroicons.check-circle')
                    ->columnSpan(3),

                ValueMetric::make('Promociones')
                    ->value(Promotion::count())
                    ->icon('heroicons.face-smile')
                    ->columnSpan(3),         

                ValueMetric::make('Valoraciones')
                    ->value(Rating::count())
                    ->icon('heroicons.star')
                    ->columnSpan(3),         
            
        ])
        ];
	}
}
