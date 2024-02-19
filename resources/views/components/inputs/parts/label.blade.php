@slotor($label)
<label class="form-label" for="{{ $id }}">
    {{ $text }}
    @if($attributes['required'])
        <span class="text-danger">*</span>
    @endif
</label>
@endslotor
