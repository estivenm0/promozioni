<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Rating;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Attributes\Icon;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;

#[Icon('s.star')]
/**
 * @extends ModelResource<Rating>
 */
class RatingResource extends ModelResource
{
    protected string $model = Rating::class;

    protected string $title = 'Valoraciones';

    protected function getActiveActions(): array
    {
        return [];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {

        return [
            ID::make()->sortable(),

            Number::make('Estrellas', 'stars')
                ->sortable()
                ->stars(),

            Text::make('Comentario', 'comment'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
            ]),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param  Rating  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
