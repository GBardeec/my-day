@if($hasWrapper)
    <div class="form-group">
        {{ $slot }}
    </div>
@else
    {{ $slot }}
@endif
