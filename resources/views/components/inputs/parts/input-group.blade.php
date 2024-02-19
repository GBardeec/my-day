@props(['inputGroupAppend', 'inputGroupPrepend'])
@php($hasInputGroup = isset($inputGroupPrepend) || isset($inputGroupAppend))
@if(!$hasInputGroup)
    {{ $slot }}
@else
    <div class="input-group">
        @if(isset($inputGroupPrepend))
            <div class="input-group-prepend">
                {{ $inputGroupPrepend }}
            </div>
        @endif
        {{ $slot }}
        @if(isset($inputGroupAppend))
            <div class="input-group-append">
                {{ $inputGroupAppend }}
            </div>
        @endif
    </div>
@endif
