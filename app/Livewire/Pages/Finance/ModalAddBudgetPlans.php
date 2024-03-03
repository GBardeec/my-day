<?php

namespace App\Livewire\Pages\Finance;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ModalAddBudgetPlans extends Component
{
    public function render(): View
    {
        return view('livewire.pages.finance.modal-add-budget-plans');
    }

    public function create(): void
    {

    }
}
