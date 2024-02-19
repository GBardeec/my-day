<?php

namespace App\View\Components\Inputs;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class BasicInput extends Component
{
    public string $dotCode;
    public string $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $text,
        public ?string $code = null,
        public ?string $value = null,
        public ?string $model = null,
        public bool $hasWrapper = true
    ) {
        $this->id = Str::random(6);
        $this->dotCode = str_replace(['[', ']'], ['.', ''], $this->code);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.basic_input');
    }

    public function getValue()
    {
        $modelKey = $this->dotCode;
        if ($this->dotCode != $this->code) {
            //model is usually the last nested child
            //get the last nested key
            $modelKey = Str::afterLast($this->dotCode, '.');
        }
        $value = $this->value ?? data_get($this->model, $modelKey) ?? '';
        if ($value instanceof \DateTimeInterface) {
            $value = $value->format('Y-m-d');
        }
        return $value;
    }
}
