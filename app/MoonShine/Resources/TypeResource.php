<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Type;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Attributes\Icon;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;

#[Icon('s.clipboard')]
/**
 * @extends ModelResource<Type>
 */
class TypeResource extends ModelResource
{
    protected string $model = Type::class;

    protected string $title = 'Tipos de Negocios';

    protected string $column = 'name';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected function activeActions(): ListOf
    {
        return parent::activeActions()
            ->except(Action::VIEW, Action::MASS_DELETE);
    }

    public function search(): array
    {
        return ['id', 'name'];
    }

    private function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Nombre', 'name')
                ->required(),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ...$this->fields(),
            BelongsToMany::make('Negocios', 'businesses', resource: BusinessResource::class)
                ->relatedLink(),

        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make($this->fields()),
        ];
    }

    /**
     * @param  Type  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name' => moonshineRequest()->isMethod('POST') ?
                    'required|string|max:50|unique:types,name' :
                    'required|string|max:50|unique:types,name,'.$item->id,
        ];
    }
}
