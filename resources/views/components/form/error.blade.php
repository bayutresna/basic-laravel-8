@props(['name'])
@error($name)
    <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
@enderror