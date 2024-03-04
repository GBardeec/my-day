<?php

namespace App\Livewire\Pages\Finance;

use App\Models\Budget;
use App\Models\BudgetCategory;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ModalAddFinance extends Component
{
    public string $type;
    public string $date;
    public array $values;


    public function mount(string $type): void
    {
        if ($type !== 'income' && $type !== 'expense') {
            abort(404, 'Не известный тип финансов');
        }

        $this->type = $type === 'expense' ? BudgetCategory::EXPENSE : BudgetCategory::INCOME;
        $this->date = Carbon::now()->format('Y-m-d');
        $this->values = [
            [
                'amount' => null,
                'budget_category' => null,
            ]
        ];
    }

    public function render(): View
    {
        return view('livewire.pages.finance.modal-add-finance');
    }

    #[Computed]
    public function getCategories(): Collection
    {
        return BudgetCategory::query()
            ->whereIn('user_id', [auth()->user()->id, BudgetCategory::DEFAULT_CATEGORIES_FROM_ADMIN_ID])
            ->where('type', $this->type)
            ->pluck('name', 'name')
            ->prepend('Выберите категорию', null);
    }

    public function add(): void
    {
        $this->values[] = ['amount' => null, 'budget_category' => null];
    }

    public function create(): void
    {
        if (in_array(null, array_column($this->values, 'amount')) || in_array(null, array_column($this->values, 'budget_category'))) {
            $this->js("alert('Ошибка. Не до конца заполнены данные')");
            return;
        }

        $this->values = array_map(function ($plan) {
            return [
                'amount' => (int)$plan['amount'],
                'budget_category' => $plan['budget_category']
            ];
        }, $this->values);

        $checkBudget = Budget::query()
            ->where('type', $this->type)
            ->where('user_id', auth()->user()->id)
            ->where('date_at', $this->date)
            ->first();

        if ($checkBudget) {
            $checkBudget->values = array_merge($checkBudget->values, $this->values);

            $budget = $checkBudget->save();
        } else {
            $budget = Budget::create([
                'values' => $this->values,
                'date_at' => $this->date,
                'type' => $this->type,
                'user_id' => auth()->user()->id,
            ]);
        }

        if ($budget) {
            $this->dispatch('hideModal');
            $this->dispatch('finance-edited');
            return;
        }

        abort(422, 'Произошла ошибка при сохранении');
    }
}
