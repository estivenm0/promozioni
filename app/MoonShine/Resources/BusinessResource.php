<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Email;
use MoonShine\Fields\Image;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Business>
 */
class BusinessResource extends ModelResource
{
    protected string $model = Business::class;

    protected string $title = 'Negocios';

    protected string $column = 'name';

    protected array $with = ['user','branches'];

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Image::make('Image', 'image')
                ->disk('businesses')
                ->hideOnIndex(),
                BelongsTo::make('Dueño', 'user', resource: new UserResource()),
                Text::make('Nombre', 'name'),
                Text::make('Descripción', 'description')->hideOnIndex(),
                Email::make('Correo', 'email')->hideOnIndex(),
                Phone::make('Teléfono', 'phone')->hideOnIndex(),
                HasMany::make('Sucursales', 'branches', resource:  new BranchResource() )->onlyLink(),
                // BelongsToMany::make('Tipos', 'types' ,resource: new TypeResource())
                // ->fields([ Text::make('name') ])
                // ->hideOnIndex()
            ]),
        ];
    }

    public function getActiveActions(): array
    {
        return ['view', 'delete', 'massDelete'];
    }

    /**
     * @param Business $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
