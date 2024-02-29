<?php

namespace App\Livewire\Pages\Finance;

use App\Models\Budget;
use App\Models\BudgetCategory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ModalAddFinance extends Component
{
    public string $type;
    public string $date;
    public string $amount;
    public $selectedCategory;

    public $categories;

    public function mount(string $type): void
    {
        if ($type !== 'income' && $type !== 'expense') {
            abort(404, 'Не известный тип финансов');
        }

        $this->type = $type === 'expense' ? BudgetCategory::EXPENSE : BudgetCategory::INCOME;
        $this->date = Carbon::now()->format('Y-m-d');
        $this->categories = BudgetCategory::query()
            ->whereIn('user_id', [auth()->user()->id, BudgetCategory::DEFAULT_CATEGORIES_FROM_ADMIN_ID])
            ->where('type', $this->type)
            ->pluck('name', 'id');

        $this->selectedCategory =  $this->categories->keys()->first();
    }

    public function render(): View
    {
        return view('livewire.pages.finance.modal-add-finance');
    }

    public function create(): void
    {
        $budget = Budget::create([
            'amount' => $this->amount,
            'date_at' => $this->date,
            'type' => $this->type,
            'user_id' => auth()->user()->id,
            'budget_categories_id' => $this->selectedCategory
        ]);

        if ($budget) {
            $this->dispatch('hideModal');
            $this->dispatch('finance-edited');
            return;
        }

        abort(422, 'Произошла ошибка при сохранении');
    }
}
