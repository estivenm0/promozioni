<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Business;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Rating;
use App\Models\Type;
use App\Models\User;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle(),
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        return [
            Grid::make([
                ValueMetric::make('Users')
                    ->value(User::count())
                    ->icon('s.user-group')
                    ->columnSpan(4),

                ValueMetric::make('Tipos')
                    ->value(Type::count())
                    ->icon('s.clipboard')
                    ->columnSpan(4),

                ValueMetric::make('Categorias')
                    ->value(Category::count())
                    ->icon('s.tag')
                    ->columnSpan(4),

                ValueMetric::make('Negocios')
                    ->value(Business::count())
                    ->icon('s.building-storefront')
                    ->columnSpan(4),

                ValueMetric::make('Negocios Pendientes')
                    ->value(Business::where('status', 'pendiente')->count())
                    ->icon('s.hand-raised')
                    ->columnSpan(4),

                ValueMetric::make('Negocios Rechazadas')
                    ->value(Business::where('status', 'rechazado')->count())
                    ->icon('s.hand-thumb-down')
                    ->columnSpan(4),

                ValueMetric::make('Negocios Aprobadas')
                    ->value(Business::where('status', 'aprobado')->count())
                    ->icon('s.hand-thumb-up')
                    ->columnSpan(4),

                ValueMetric::make('Promociones')
                    ->value(Promotion::count())
                    ->icon('s.bolt')
                    ->columnSpan(4),

                ValueMetric::make('Valoraciones')
                    ->value(Rating::count())
                    ->icon('s.star')
                    ->columnSpan(4),

            ]),
        ];
    }
}
