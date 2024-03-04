<?php

namespace App\Livewire\Pages\Finance;

use App\Models\Budget;
use App\Models\BudgetCategory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
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

    public function getBudgetData(int $type, string $dateForBudget): Builder|Model|array
    {
        $categories = BudgetCategory::query()
            ->whereIn('user_id', [auth()->user()->id, BudgetCategory::DEFAULT_CATEGORIES_FROM_ADMIN_ID])
            ->where("type", $type)
            ->pluck('name', 'id')
            ->toArray();

        $budgetsValues = Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', $type)
            ->whereDate('date_at', $dateForBudget)
            ->first();

        if (!$budgetsValues) {
            return [];
        }

        $newValues = [];

        foreach ($budgetsValues->values as $key => $value) {
            $modifyArray = [
                'amount' => $value['amount'],
                'budget_category' => $categories[$value['budget_category_id']],
            ];

            $newValues[$key] = $modifyArray;
        }

        $budgetsValues->values = $newValues;

        return $budgetsValues;
    }

    public function getBudgetExpense(): Builder|Model|array
    {
        return $this->getBudgetData(Budget::EXPENSE, $this->dateForExpense);
    }

    public function getBudgetIncome(): Builder|Model|array
    {
        return $this->getBudgetData(Budget::INCOME, $this->dateForIncome);
    }

    public function delete(int $budgetId,int $keyInArray): void
    {
        $budget = Budget::query()
            ->where('id', $budgetId)
            ->first();

        $budget->values = collect($budget->values)->forget($keyInArray)->toArray();

        $budget->save();
    }

    #[On('finance-edited')]
    public function financeEdited()
    {
        //
    }

}
