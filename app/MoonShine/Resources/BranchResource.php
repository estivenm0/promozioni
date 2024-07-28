<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Branch>
 */
class BranchResource extends ModelResource
{
    protected string $model = Branch::class;

    protected string $title = 'Sucursales';

    protected bool $editInModal = true;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Negocio', 'Business', resource: new BusinessResource())->hideOnIndex(),
                Text::make('Nombre', 'name'),
                Text::make('Estado', 'status')
                ->badge(fn($item)=> match($item){
                    'pendiente' => 'blue',
                    'aprobado' => 'green',
                    'rechazado' => 'red',
                }),
                Text::make('Descripción', 'status_description')->hideOnIndex(),
                Text::make('Dirección', 'address')->hideOnIndex(),              
                Date::make('Creada en', 'created_at')->format('d/m/Y'),
            ]),
        ];
    }

    public function formFields(): array
    {
        return [
            Select::make('Estado', 'status')
            ->options([
                'Pendiente' => 'pendiente',
                'Aprobado' => 'aprobado',
                'rechazado' => 'rechazado'
            ]),
            Text::make('Descripción', 'status_description')
        ];    
    }

    public function getActiveActions(): array
    {
        return ['view','update', 'delete', 'massDelete'];
    }

    /**
     * @param Branch $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
