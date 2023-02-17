@props(['name'])

<x-form.field>
    <x-form.error name="{{ $name }}"/>

    <x-form.label name="{{ $name }}"/>


    <input class="border border-gray-200 rounded p-2 w-full" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        required
        value="{{ old($name) }}"
        {{ $attributes }}>
</x-form.field>