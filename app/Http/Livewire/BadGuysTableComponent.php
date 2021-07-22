<?php

namespace App\Http\Livewire;

use App\Models\BadGuy;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Integer;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\TableComponent;
use App\Models\Rule;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class BadGuysTableComponent extends DataTableComponent
{
    public bool $modalOpened = false;

    public $rule;
    public $recomendation = '';

    public $selected_rule;

    public $servers = [];
    public $server_id;
    public $rule_id;

    public BadGuy $bad;

    public bool $columnSelect = true;
    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';

    public array $bulkActions = [

    ];


    protected $rules = [
        'bad.bad_user' => 'required|string|max:100',
        'bad.punishment' => 'required|string|max:255',
        'bad.duration' => 'integer|required',
        'bad.rule_id' => 'required|integer',
        'bad.user_id' => 'required|integer',
        'bad.server_id' => 'required|integer',
        'bad.note' => 'string|max:255',
    ];

    public function mount()
    {
        if(auth()->user()->is_admin){
            $this->bulkActions = ['selectToRemove' => 'Remove',];
        }
        $this->bad = new BadGuy();
        $this->servers = \App\Models\Server::all();
        $this->rule = Rule::all();
        $this->rule_id = $this->rule->first()->id;
        $this->recomendation = $this->rule->first()->punishment;
        $this->bad->user_id = auth()->id();
    }

    public function updated()
    {
        $this->recomendation = $this->rule->where('id', '=', $this->rule_id)->first()->punishment;
    }

    public function save()
    {
        $this->validate();
        $this->bad->save();
        $this->modalOpened = false;
        //dd($this->bad);
        //return redirect()->to('/dashboard');
    }

    public function columns() : array
    {
        return[
            Column::make('Плохой парень', 'bad_user')->sortable()->searchable(),
            Column::make('Модератор', 'user.name'),
            Column::make('Cервер', 'server.host'),
            Column::make('Правило', 'rule.name'),
            Column::make('Наказание', 'punishment')->sortable(),
            Column::make('Время', 'duration')->sortable(),
            Column::make('Время нарушения', 'created_at')->sortable(),
            ];
    }


    public function query() : Builder
    {
        $query = BadGuy::query()->with(['user', 'server', 'rule'])
            ->when($this->getFilter('punishment'), fn ($query, $type) => $query->where('punishment', $type));
        return $query;
    }

    public function modalsView(): string
    {
        return 'bad-guys.modal';
    }

    public function selectToRemove()
    {
        BadGuy::destroy($this->selectedKeys);
    }

    public function filters(): array
    {
        return [
            'punishment' => Filter::make('Наказание')->select(
                [1=>'Mute', 2=>'Jail', 3=>'Ban']
            )
        ];
    }

    public function showModal()
    {
        $this->modalOpened = true;
    }
}
