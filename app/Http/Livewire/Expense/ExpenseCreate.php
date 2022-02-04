<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ExpenseCreate extends Component
{
    /**
     * @var
     */
    public $amount;
    public $description;
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

    public function createExpense()
    {
        $this->validate();
        Expense::create([
            'description' => $this->description,
            'amount' => $this->amount,
            'type' => $this->type,
            'user_id' => Auth::user()->id
        ]);
        session()->flash('success', 'Registro cadastrado com sucesso');
        $this->description = '';
        $this->amount = '';
        $this->type = '';

    }

    public function render()
    {
        return view('livewire.expense.expense-create');
    }
}
