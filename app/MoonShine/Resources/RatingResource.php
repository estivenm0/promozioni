<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Rating>
 */
class RatingResource extends ModelResource
{
    protected string $model = Rating::class;

    protected string $title = 'Valoraciones';

    protected array $with = ['user:id,name', 'branch:id,name'];


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Usuario', 'user', resource: new UserResource())
                    ->showOnExport(),
                BelongsTo::make('Sucursal', 'branch', resource: new BranchResource())
                    ->showOnExport(),
                Number::make('Valor', 'value')
                    ->stars()
                    ->min(1)
                    ->max(5)
                    ->showOnExport(),
                Text::make('Contenido', 'content')
                    ->showOnExport(),

            ]),
        ];
    }

    public function getActiveActions(): array
    {
        return ['delete', 'massDelete'];
    }

    public function search(): array
    {
        return ['id', 'user.name', 'branch.name'];
    }

    /**
     * @param Rating $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
