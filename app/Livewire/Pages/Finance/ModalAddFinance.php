<?php

namespace App\Livewire\Pages\Finance;

use Livewire\Component;

class ModalAddFinance extends Component
{
    public string $type;
    public string $date;

    public function mount(string $type): void
    {
        if ($type !== 'income' && $type !== 'expense') {
            abort(404, 'Не известный тип финансов');
        }

        $this->type = $type;
    }
    public function render()
    {
        return view('livewire.pages.finance.modal-add-finance');
    }
}
