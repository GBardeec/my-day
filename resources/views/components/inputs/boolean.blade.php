<x-inputs.parts.wrapper :$hasWrapper>
    <input type="checkbox"
        {{ $attributes->merge([
            'id' => $id,
            'class' => 'form-check-inline',
            'name' => $code,
        ]) }}
    >
    @include('components.inputs.parts.label')
</x-inputs.parts.wrapper>
