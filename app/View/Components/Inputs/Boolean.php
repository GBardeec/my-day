<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Boolean extends BasicInput
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.boolean');
    }
}
