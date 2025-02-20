<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\StatusEnum;
use App\Models\Business;
use Illuminate\Validation\Rule;
use MoonShine\Contracts\UI\ActionButtonContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Attributes\Icon;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\Badge;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Phone;
use MoonShine\UI\Fields\Text;

#[Icon('s.building-storefront')]
/**
 * @extends ModelResource<Business>
 */
class BusinessResource extends ModelResource
{
    protected string $model = Business::class;

    protected string $column = 'name';

    protected string $title = 'Negocios';

    protected array $with = ['user'];

    protected bool $editInModal = true;

    protected bool $columnSelection = true;

    protected function activeActions(): ListOf
    {
        return parent::activeActions()
            ->except(Action::DELETE, Action::MASS_DELETE, Action::CREATE);
    }

    public function search(): array
    {
        return ['id', 'name'];
    }

    protected function modifyEditButton(ActionButtonContract $button): ActionButtonContract
    {
        return $button->icon('s.shield-exclamation')->warning();
    }

    private function fields(): array
    {
        return [
            ID::make()->sortable(),

            Image::make('Image', 'image')
                ->disk('businesses'),

            BelongsTo::make('Dueño', 'user', resource: UserResource::class),

            Text::make('Nombre', 'name'),

            Enum::make('Estado', 'status')
                ->attach(StatusEnum::class),

            BelongsToMany::make('Tipos', 'types', resource: TypeResource::class)
                ->inLine(
                    separator: ' ',
                    badge: fn ($model, $value) => Badge::make((string) $value, 'primary'),
                ),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ...$this->fields(),
            HasMany::make('Promociones', 'promotions')->relatedLink(),
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

                Enum::make('Estado', 'status')
                    ->attach(StatusEnum::class),

                Text::make('Descripción', 'status_description')
                    ->nullable(),
            ]),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ...$this->fields(),

            Text::make('Descripción', 'description'),

            Text::make('Descripción de Estado', 'status_description'),

            Text::make('Dirección', 'address'),

            Email::make('Correo', 'email'),

            Phone::make('Teléfono', 'phone'),

            HasMany::make('Promociones', 'promotions')
                ->searchable(false),

            HasMany::make('Valoraciones', 'ratings')
                ->searchable(false),

        ];
    }

    /**
     * @param  Business  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'status' => ['required', Rule::in(array_column(StatusEnum::cases(), 'value'))],
            'status_description' => 'nullable|max:255',
        ];
    }

    protected function filters(): iterable
    {
        return [
            BelongsTo::make('Dueño', 'user', resource: UserResource::class)
                ->nullable(),

            Enum::make('Estado', 'status')
                ->attach(StatusEnum::class),

            BelongsToMany::make('Tipos', 'types', resource: TypeResource::class),

        ];
    }
}
