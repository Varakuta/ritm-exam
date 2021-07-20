<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

use App\Models\Rule;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\TableComponent;


class RuleTableComponent extends DataTableComponent
{
    public bool $columnSelect = true;
    //public string $defaultSortColumn = 'sort';
    //public bool $reorderEnabled = true;

    public function columns() : array
    {
        return[
            Column::make('Название', 'name')->sortable()->searchable(),
            Column::make('Описание', 'description')->searchable(),
            Column::make('Наказание', 'punishment')->searchable(),
        ];
    }

    public function query() : Builder
    {
        return Rule::query();
    }

    public function getTableRowUrl($row): string
    {
        return route('rule_edit', $row);
    }
}
