<?php

namespace App\Livewire\Pages\Finance;

use App\Models\Budget;
use App\Models\BudgetCategory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class IncludeBudgetForDay extends Component
{
    public string $dateForExpense;
    public string $dateForIncome;

    public function mount(): void
    {
        $this->dateForExpense = Carbon::now()->format('Y-m-d');
        $this->dateForIncome = Carbon::now()->format('Y-m-d');
    }

    public function render(): View
    {
        return view('livewire.pages.finance.include-budget-for-day');
    }

    #[Computed]
    public function getBudgetExpense()
    {
        $expenses = Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', Budget::EXPENSE)
            ->whereDate('date_at', $this->dateForExpense)
            ->value('values');

        return collect($expenses)->transform(function ($expense) {
            $expense['budget_category'] = BudgetCategory::query()
                ->where('id', $expense['budget_category_id'])
                ->value('name');

            unset($expense['budget_category_id']);

            return $expense;
        });
    }

    #[Computed]
    public function getBudgetIncome()
    {
        $expenses = Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', Budget::INCOME)
            ->whereDate('date_at', $this->dateForIncome)
            ->value('values');

        return collect($expenses)->transform(function ($expense) {
            $expense['budget_category'] = BudgetCategory::query()
                ->where('id', $expense['budget_category_id'])
                ->value('name');

            unset($expense['budget_category_id']);

            return $expense;
        });
    }
}
