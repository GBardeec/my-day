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


    public function render(): View
    {
        return view('livewire.pages.finance.finance-page');
    }

    public function setActiveVariable($variable): void
    {
        if ($variable === 'budgetForDay') {
            $this->budgetForDay = true;
            $this->budgetPlanning = false;
            $this->totalBudget = false;
        } elseif ($variable === 'budgetPlanning') {
            $this->budgetForDay = false;
            $this->budgetPlanning = true;
            $this->totalBudget = false;
        } elseif ($variable === 'totalBudget') {
            $this->budgetForDay = false;
            $this->budgetPlanning = false;
            $this->totalBudget = true;
        }
    }

    #[On('finance-edited')]
    public function onFinanceEdited(): void
    {
        //
    }
}
