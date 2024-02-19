<?php

namespace App\Livewire\Pages\Finance;

use App\Models\BudgetCategory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ModalAddCategories extends Component
{
    public string $name;
    public string $type;

    public function render(): View
    {
        return view('livewire.pages.finance.modal-add-categories');
    }

    #[Computed]
    public function getCategoryConst(): array
    {
        return [
            BudgetCategory::EXPENSE => 'Расходы',
            BudgetCategory::INCOME => 'Доходы'
        ];
    }

    public function create()
    {
        $budgetCategory = BudgetCategory::create([
            'name' => $this->name,
            'type' => $this->type === 'expense' ? BudgetCategory::EXPENSE : BudgetCategory::INCOME,
            'user_id' => auth()->user()->id,
        ]);

        if ($budgetCategory) {
            $this->dispatch('hideModal');
            $this->dispatch('finance-edited');
            return;
        }

        abort(422, 'Произошла ошибка при сохранении');
    }
}
