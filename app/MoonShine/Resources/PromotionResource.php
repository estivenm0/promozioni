<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Promotion;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Attributes\Icon;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\DateRange;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;

#[Icon('s.bolt')]
/**
 * @extends ModelResource<Promotion>
 */
class PromotionResource extends ModelResource
{
    protected string $model = Promotion::class;

    protected string $title = 'Promociones';

    protected array $with = ['category'];

    protected bool $detailInModal = true;

    protected bool $columnSelection = true;

    protected function activeActions(): ListOf
    {
        return parent::activeActions()->only(Action::VIEW, Action::DELETE);
    }

    public function search(): array
    {
        return ['id', 'title'];
    }

    private function fields(): array
    {
        return [
            ID::make()->sortable(),

            Image::make('Imagen', 'image')->disk('promotions'),

            BelongsTo::make('Negocio', 'business', resource: BusinessResource::class)
                ->badge('secondary'),

            BelongsTo::make('Categoría', 'category', resource: CategoryResource::class)
                ->badge(),

            Text::make('Título', 'title'),

            DateRange::make('Inicio - Fin')
                ->fromTo('start_date', 'end_date')
                ->format('d/m/Y'),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return $this->fields();
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ...$this->fields(),
            Text::make('Descripción', 'description'),
        ];
    }

    /**
     * @param  Promotion  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }

    protected function filters(): iterable
    {
        return [
            BelongsTo::make('Negocio', 'business', resource: BusinessResource::class)
                ->nullable(),

            BelongsTo::make('Categoría', 'category', resource: CategoryResource::class)
                ->nullable(),

            DateRange::make('Inicio - Fin')
                ->fromTo('start_date', 'end_date')
                ->format('d/m/Y'),
        ];
    }
}
