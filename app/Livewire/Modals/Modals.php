<?php

namespace App\Livewire\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class Modals extends Component
{
    public $alias;
    public $size = "modal-lg";
    public $params = [];
    public $activeModal;

    #[On('showModal')]
    public function showModal($data)
    {
        $this->alias = $data['alias'];
        if (isset($data['size'])) {
            $this->size = $data['size'];
        }
        $this->params = $data['params'] ?? [];
        $this->activeModal = "modal-id-" . rand();
        $this->dispatch('showBootstrapModal');
    }

    #[On('resetModal')]
    public function resetModal()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.modals.modals');
    }
}
