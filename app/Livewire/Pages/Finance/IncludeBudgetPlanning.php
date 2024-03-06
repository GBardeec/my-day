<?php

namespace App\Livewire\Pages\Finance;

use App\Models\BudgetPlan;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class IncludeBudgetPlanning extends Component
{
    public ?int $selectedExpensePlanId = null;
    public ?int $selectedIncomePlanId = null;

    public function render(): View
    {
        return view('livewire.pages.finance.include-budget-planning');
    }

    public function getPlan(int $type): Collection
    {
        return BudgetPlan::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', $type)
            ->orderBy('started_at')
            ->get();
    }

    #[Computed]
    public function getExpensePlan(): Collection
    {
        return $this->getPlan(BudgetPlan::EXPENSE);
    }

    #[Computed]
    public function getIncomePlan(): Collection
    {
        return $this->getPlan(BudgetPlan::INCOME);
    }

}
