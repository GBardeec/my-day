<?php

namespace App\Livewire\Pages\Finance;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class FinancePage extends Component
{
    public string $dateForExpense;
    public string $dateForIncome;
    public $budgetExpense;
    public $budgetIncome;

    public function mount(): void
    {
        $this->dateForExpense = Carbon::now()->format('Y-m-d');
        $this->dateForIncome = Carbon::now()->format('Y-m-d');

        $this->getBudgetExpense();
        $this->getBudgetIncome();
    }

    public function render(): View
    {
        return view('livewire.pages.finance.finance-page');
    }

    public function getBudgetExpense(string $date = null): void
    {
        if ($date === null) {
            $date = Carbon::now();
        }

        $this->budgetExpense = Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', Budget::EXPENSE)
            ->whereDate('created_at', $date)
            ->with('budgetCategory')
            ->get();
    }

    public function getBudgetIncome(string $date = null): void
    {
        if ($date === null) {
            $date = Carbon::now();
        }

        $this->budgetIncome = Budget::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', Budget::INCOME)
            ->whereDate('created_at', $date)
            ->get();
    }

    #[On('finance-edited')]
    public function onFinanceEdited(): void
    {
        //
    }
}
