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

    public function getBudgetData(int $type, string $dateForBudget): Builder|Model|null
    {
        return Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', $type)
            ->whereDate('date_at', $dateForBudget)
            ->first();
    }

    public function getBudgetExpense(): Model|Builder|null
    {
        return $this->getBudgetData(Budget::EXPENSE, $this->dateForExpense);
    }

    public function getBudgetIncome(): Model|Builder|null
    {
        return $this->getBudgetData(Budget::INCOME, $this->dateForIncome);
    }

    public function delete()
    {

    }

    #[On('finance-edited')]
    public function financeEdited()
    {
        //
    }

}
