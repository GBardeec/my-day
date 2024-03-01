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

    public function create(int $type): void
    {
        $id = 'new' . rand(1, 1000);

        $this->categories[$id] = [
            'id' => $id,
            'name' => null,
            'type' => $type,
            'user_id' => auth()->user()->id,
        ];
    }

    public function update($id)
    {
        $changedCategory = collect($this->categories)->where('id', $id)->first();

        try {
            if (!preg_match('/new/i', $changedCategory['id'])) {
                $category = BudgetCategory::find($id);
                $category->name = $changedCategory['name'];
                $category->save();
            } else {
                $category = new BudgetCategory();
                $category->name = $changedCategory['name'];
                $category->type = $changedCategory['type'];
                $category->user_id = $changedCategory['user_id'];

                $category->save();
            }

            $this->dispatch('finance-edited');
            $this->js("alert('Данные успешно изменены')");
        } catch (\Exception $e) {
            $this->js("alert('Ошибка при сохранении')");
        }
    }

    public function delete(?string $id): void
    {
        try {
            if (!preg_match('/new/i', $this->categories[$id]['id'])) {
                $category = BudgetCategory::find($id);
                $category->delete();
            }

            $this->categories[$id] = null;

            $this->js("alert('Категория успешно удалена')");
        } catch (\Exception $e) {
            $this->js("alert('Ошибка при удалении')");
        }
    }
}
