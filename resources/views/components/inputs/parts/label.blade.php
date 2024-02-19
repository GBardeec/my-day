@slotor($label)
<label class="form-label mt-2 mb-0" for="{{ $id }}">
    {{ $text }}
    @if($attributes['required'])
        <span class="text-danger">*</span>
    @endif
</label>
@endslotor
