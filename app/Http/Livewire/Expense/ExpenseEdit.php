<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseEdit extends Component
{
    public Expense $expense;

    public $description;
    public $amount;
    public $type;

    protected $rules =
        [
            'description' => 'required|min:3',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'type' => 'required'
        ];

    protected $messages =
        [
            'description.required' => 'O campo descrição é obrigatório',
            'amount.numeric' => 'O campo é somente números',
            'type.required' => 'Selecione uma das opções'
        ];

    public function mount(/*Expense $expense*/)
    {
        $this->description = $this->expense->description;
        $this->amount = $this->expense->amount;
        $this->type = $this->expense->type;
    }

    public function updateExpense()
    {
        $this->validate();

        $this->expense->update(
            [
                'description' => $this->description,
                'amount' => $this->amount,
                'type' => $this->type,
            ]
        );

        session()->flash('success', 'Registro atualizado com sucesso!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.expense.expense-edit');
    }
}
