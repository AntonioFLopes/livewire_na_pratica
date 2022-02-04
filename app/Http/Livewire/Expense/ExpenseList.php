<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseList extends Component
{


    public function render()
    {
        $expenses = auth()->user()->expenses()->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.expense.expense-list', compact('expenses'));
    }

    public function remove($expense)
    {
        $exp = Expense::find($expense);
        $exp->delete();

        session()->flash('success', 'registro removido com sucesso!');
    }
}
