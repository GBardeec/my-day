<?php

namespace App\Livewire\Pages\Finance;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ModalAddFinance extends Component
{
    public string $type;
    public string $date;
    public string $sum;

    public function mount(string $type): void
    {
        if ($type !== 'income' && $type !== 'expense') {
            abort(404, 'Не известный тип финансов');
        }

        $this->type = $type;
        $this->date = Carbon::now()->format('Y-m-d');
    }

    public function render(): View
    {
        return view('livewire.pages.finance.modal-add-finance');
    }

    public function getCategories()
    {

    }
}
