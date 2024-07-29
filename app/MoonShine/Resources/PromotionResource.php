<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Promotion;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;

/**
 * @extends ModelResource<Promotion>
 */
class PromotionResource extends ModelResource
{
    protected string $model = Promotion::class;

    protected string $title = 'Promociones';

    protected array $with = ['category'];

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Image::make('Imagen', 'image')->disk('promotions')
                    ->hideOnIndex()
                    ->showOnExport(),
                BelongsTo::make('Negocio', 'branch', resource: new BranchResource())
                    ->hideOnIndex()
                    ->showOnExport(),
                BelongsTo::make('Categoría', 'category', resource: new CategoryResource())
                    ->showOnExport(),
                Text::make('Título', 'title')
                    ->showOnExport(),
                Text::make('Descripción', 'description')
                    ->hideOnIndex()
                    ->showOnExport(),
                DateRange::make('Inicio - Fin')
                    ->fromTo('start_date', 'end_date')
                    ->format('d/m/Y')
                    ->showOnExport()

            ]),
        ];
    }


    public function getActiveActions(): array
    {
        return ['delete', 'view'];
    }


    /**
     * @param Promotion $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
