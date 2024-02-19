@props(['name'])
@error($name ?? null) <span class="d-block text-danger">{{ $message }}</span> @enderror
