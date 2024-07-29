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

    protected string $column = 'name';

    protected string $sortColumn = 'status';

    protected string $sortDirection = 'ASC';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Negocio', 'Business', resource: new BusinessResource())
                    ->hideOnIndex()
                    ->showOnExport(),
                Text::make('Nombre', 'name')
                    ->showOnExport(),
                Text::make('Estado', 'status')
                    ->showOnExport()
                    ->badge(fn ($item) => match ($item) {
                        'pendiente' => 'blue',
                        'aprobado' => 'green',
                        'rechazado' => 'red',
                    })->sortable()
                    ->showOnExport(),
                Text::make('Descripción', 'status_description')
                    ->hideOnIndex()
                    ->showOnExport(),
                Text::make('Dirección', 'address')
                    ->hideOnIndex()
                    ->showOnExport(),
                Date::make('Creada en', 'created_at')->format('d/m/Y')
                    ->sortable()
                    ->showOnExport(),
            ]),
        ];
    }

    public function formFields(): array
    {
        return [
            Select::make('Estado', 'status')
                ->options([
                    'pendiente' => 'pendiente',
                    'aprobado' => 'aprobado',
                    'rechazado' => 'rechazado'
                ]),
            Text::make('Descripción', 'status_description')
        ];
    }

    public function search(): array
    {
        return ['id', 'name'];
    }

    public function getActiveActions(): array
    {
        return ['view', 'update', 'delete', 'massDelete'];
    }

    public function redirectAfterSave(): string
    {
        return $this->url();
    }

    /**
     * @param Branch $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'status' => 'required|in:pendiente,aprobado,rechazado',
            'status_description' => 'nullable|max:255'
        ];
    }
}
