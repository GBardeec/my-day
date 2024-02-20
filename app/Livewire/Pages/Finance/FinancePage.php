<?php

namespace App\Livewire\Pages\Finance;

use App\Models\Budget;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class FinancePage extends Component
{
    public string $dateForExpense;
    public string $dateForIncome;
    public $budgetExpense;
    public $budgetIncome;

    public function mount()
    {
        $this->dateForExpense = Carbon::now()->format('Y-m-d');
        $this->dateForIncome = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.pages.finance.finance-page');
    }

    #[Computed]
    public function getBudget(string $date, string $type): void
    {
        if ($type === 'expense') {
            $this->budgetExpense = Budget::query()
                ->where('user_id', auth()->user()->id)
                ->where('type', Budget::EXPENSE)
                ->whereDate('created_at', $date)
                ->get();
            $this->render();
        } elseif ($type === 'income') {
            $this->budgetIncome = Budget::query()
                ->where('user_id', auth()->user()->id)
                ->where('type', Budget::INCOME)
                ->whereDate('created_at', $date)
                ->get();
        } else {
            abort(404, 'Тип не найден');
        }
    }

    #[On('finance-edited')]
    public function onFinanceEdited(): void
    {
        //
    }
}
