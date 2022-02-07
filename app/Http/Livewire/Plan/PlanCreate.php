<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Services\PagSeguro\Plan\PlanCreateService;
use Livewire\Component;

class PlanCreate extends Component
{
    public array $plan = [];

    protected $rules = [
        'plan.name' => 'required',
        'plan.description' => 'required',
        'plan.price' => 'required',
        'plan.slug' => 'required',
      //  'plan.reference' => 'required',
    ];

    protected $messages = [
        'plan.name.required' => 'O campo nome é obrigatório',
        'plan.description.required' => 'O campo descrição é obrigatório',
        'plan.price.required' => 'O campo preço é obrigatório',
        'plan.slug.required' => 'O campo slug é obrigatório',
        //'plan.reference.required' => 'O campo references é obrigatório',
    ];

    public function createPlan()
    {
        $this->validate();

        $plan = $this->plan;

        $planPagSeguroReference = (new PlanCreateService())->makeRequest($plan);
        $plan['reference'] = $planPagSeguroReference;

        Plan::create($plan);

        $this->plan = [];

        session()->flash('success', 'Plano cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.plan.plan-create');
    }
}
