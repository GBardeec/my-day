<?php

namespace App\Livewire\Pages\Finance;

use App\Models\BudgetCategory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ModalEditCategories extends Component
{
    public array $categories = [];

    public function mount(): void
    {
        $this->categories = BudgetCategory::query()
            ->where('user_id', auth()->user()->id)
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category['id'] => $category];
            })
            ->toArray();
    }

    public function render(): View
    {
        return view('livewire.pages.finance.modal-edit-categories');
    }

    public function update($id): void
    {
        $changedCategory = collect($this->categories)->where('id', $id)->first();

        try {
            $category = BudgetCategory::find($id);
            $category->name = $changedCategory['name'];
            $category->save();

            $this->js("alert('Данные успешно изменены')");
            $this->dispatch('hideModal');
            $this->dispatch('finance-edited');
        } catch (\Exception $e) {
            $this->js("alert('Ошибка при сохранении')");
        }
    }

    public function delete($id): void
    {
        try {
            $category = BudgetCategory::find($id);
            $category->delete();

            $this->js("alert('Категория успешно удалена')");
            $this->dispatch('hideModal');
            $this->dispatch('finance-edited');
        } catch (\Exception $e) {
            $this->js("alert('Ошибка при удалении')");
        }
    }
}
