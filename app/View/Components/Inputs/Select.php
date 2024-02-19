<?php

namespace App\View\Components\Inputs;

class Select extends BasicInput
{
    public function __construct(public iterable $options, string $text, public ?string $placeholder = null, ?string $code = null, ?string $value = null, ?string $model = null, bool $hasWrapper = true)
    {
        parent::__construct($text, $code, $value, $model, $hasWrapper);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.select');
    }
}
