<x-inputs.parts.wrapper :$hasWrapper>
    @include('components.inputs.parts.label')
    <x-inputs.parts.input-group>
        @if(isset($inputGroupPrepend))
            <x-slot:inputGroupPrepend>
                {{ $inputGroupPrepend }}
            </x-slot:inputGroupPrepend>
        @endif
        @slotor($slot)
        <input
            {{ $attributes->merge([
                'id' => $id,
                'class' => 'form-control'
            ]) }}
        >
        @endslotor
    </x-inputs.parts.input-group>
    @include('components.inputs.parts.hint')
    @include('components.inputs.parts.error', ['name' => $attributes['wire:model']])
</x-inputs.parts.wrapper>
