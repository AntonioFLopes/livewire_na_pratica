<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExpenseEdit extends Component
{
    use WithFileUploads;

    public Expense $expense;

    public $description;
    public $amount;
    public $type;
    public $photo;

    protected $rules =
        [
            'description' => 'required|min:3',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'type' => 'required',
            'photo' => 'image|nullable'
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
        $this->photo = $this->expense->photo;
    }

    public function updateExpense()
    {
        $this->validate();
        if ($this->photo) {
           if(Storage::disk('public')->exists($this->expense->photo))
               Storage::disk('public')->delete($this->expense->photo);

           $this->photo = $this->photo->store('expenses-photos', 'public');
        }
        $this->expense->update(
            [
                'description' => $this->description,
                'amount' => $this->amount,
                'type' => $this->type,
                'photo' => $this->photo ?? $this->expense->photos
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
