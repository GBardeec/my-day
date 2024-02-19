<?php

namespace App\Livewire\Pages\Finance;

use Livewire\Attributes\On;
use Livewire\Component;

class FinancePage extends Component
{
    public function render()
    {
        return view('livewire.pages.finance.finance-page');
    }

    #[On('finance-edited')]
    public function onFinanceEdited(): void
    {
        //
    }
}
