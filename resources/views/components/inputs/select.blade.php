<x-inputs.parts.wrapper :$hasWrapper>
    @include('components.inputs.parts.label')
    <x-inputs.parts.input-group>
        @if(isset($inputGroupPrepend))
            <x-slot:inputGroupPrepend>
                {{ $inputGroupPrepend }}
            </x-slot:inputGroupPrepend>
        @endif
        <select
            {{ $attributes->merge([
                'id' => $id,
                'class' => 'form-control'
            ]) }}
        >
            @if(!is_null($placeholder))
                <option value="" disabled>{{ $placeholder }}</option>
            @endif
            @foreach($options as $value => $text)
                <option value="{{ $value }}">{{ $text }}</option>
            @endforeach
        </select>
    </x-inputs.parts.input-group>
    @include('components.inputs.parts.hint')
    @include('components.inputs.parts.error', ['name' => $attributes['wire:model']])
</x-inputs.parts.wrapper>
