<?php

namespace App\Http\Livewire;

use App\Models\Rule;
use Livewire\Component;

class RuleComponent extends Component
{
    public Rule $rule;

    protected $rules = [
        'rule.name' => 'required|string|max:100',
        'rule.punishment' => 'required|string|max:255',
        'rule.description' => 'string|required|max:255'
    ];

    public function mount($row = null)
    {
        if($row){
            $rule = Rule::findOrFail($row);
            $this->rule = $rule;
        } else {
            $this->rule = new Rule();
        }

    }
    public function render()
    {
        return view('livewire.rule-component');
    }

    public function save()
    {
        $this->validate();
        $this->rule->save();
        session()->flash('message', 'Rule successfully updated.');
        return redirect()->to('/dashboard');
    }

    public function delete()
    {
        if ($this->rule->delete()){
            return redirect()->to('/dashboard');
        }
    }
}
