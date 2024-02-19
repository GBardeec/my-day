@php
    /**
     * @var \Illuminate\Support\HtmlString $label
     * @var \Illuminate\View\ComponentAttributeBag $attributes
     */
    $hasInputGroup = isset($inputGroupPrepend) || isset($inputGroupAppend);
@endphp
@if($hasWrapper)
    <div class="form-group">
        @endif
        @if(!isset($label))
            <label for="{{ $id() }}">{{ $text }}</label>
        @else
            {{ $label }}
        @endif
        @if($hasInputGroup)
            <div class="input-group">
                @if(isset($inputGroupPrepend))
                    <div class="input-group-prepend">
                        {{ $inputGroupPrepend }}
                    </div>
                @endif

                @endif
                @slotor($slot)
                <input
                    {{ $attributes->merge([
                        'id' => $id(),
                        'class' => 'form-control'
                    ]) }}
                >
                @endslotor
                @if($hasInputGroup)
                    @if(isset($inputGroupAppend))
                        <div class="input-group-append">
                            {{ $inputGroupAppend }}
                        </div>
                    @endif
            </div>
        @endif
        @if(isset($hint))
            <div class="form-text text-muted">{{ $hint }}</div>
        @endif
        @error($attributes['wire:model'] ?? null) <span class="d-block text-danger">{{ $message }}</span> @enderror
        @if($hasWrapper)
    </div>
@endif
