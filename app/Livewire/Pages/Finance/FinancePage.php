<?php

namespace App\Livewire\Pages\Finance;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class FinancePage extends Component
{
    public bool $budgetForDay = true;
    public bool $budgetPlanning = false;
    public bool $totalBudget = false;

    public string $dateForExpense;
    public string $dateForIncome;

    public function mount(): void
    {
        $this->dateForExpense = Carbon::now()->format('Y-m-d');
        $this->dateForIncome = Carbon::now()->format('Y-m-d');
    }

    public function render(): View
    {
        return view('livewire.pages.finance.finance-page');
    }

    #[Computed]
    public function getBudgetExpense(): Collection
    {
        return Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', Budget::EXPENSE)
            ->whereDate('created_at', $this->dateForExpense)
            ->with('budgetCategory')
            ->get();
    }

    #[Computed]
    public function getBudgetIncome(): Collection
    {
        return Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', Budget::INCOME)
            ->whereDate('created_at', $this->dateForIncome)
            ->get();
    }

    #[On('finance-edited')]
    public function onFinanceEdited(): void
    {
        //
    }
}
