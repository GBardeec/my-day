<?php

namespace App\Livewire\Pages\Finance;

use App\Models\BudgetCategory;
use App\Models\BudgetPlan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ModalAddBudgetPlans extends Component
{
    public string $type;
    public string $started_at;
    public string $ended_at;
    public array $plans;

    public function mount(string $type): void
    {
        $currentDate = Carbon::now();

        $this->started_at = $currentDate->startOfMonth()->addMonth()->format('Y-m-d');
        $this->ended_at = $currentDate->endOfMonth()->format('Y-m-d');

        $this->plans = [
            [
                'amount' => null,
                'budget_category_id' => null,
            ]
        ];

        $this->type = $type === 'expense' ? BudgetCategory::EXPENSE : BudgetCategory::INCOME;
    }

    public function render(): View
    {
        return view('livewire.pages.finance.modal-add-budget-plans');
    }

    #[Computed]
    public function getCategories(): Collection
    {
        return BudgetCategory::query()
            ->whereIn('user_id', [auth()->user()->id, BudgetCategory::DEFAULT_CATEGORIES_FROM_ADMIN_ID])
            ->where('type', $this->type)
            ->pluck('name', 'id')
            ->prepend('Выберите категорию', null);
    }

    public function add(): void
    {
        $this->plans[] = ['amount' => null, 'budget_category_id' => null];
    }

    public function create(): void
    {
        if (in_array(null, array_column($this->plans, 'amount')) || in_array(null, array_column($this->plans, 'budget_category_id'))) {
            $this->js("alert('Ошибка. Не до конца заполнены данные')");
            return;
        }

        $budget = BudgetPlan::create([
            'plans' => $this->plans,
            'type' => $this->type,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
            'user_id' => auth()->user()->id,
        ]);

        if ($budget) {
            $this->dispatch('hideModal');
            $this->dispatch('finance-edited');
            return;
        }

        $this->js("alert('Ошибка. Данные не сохранены')");
    }
}
