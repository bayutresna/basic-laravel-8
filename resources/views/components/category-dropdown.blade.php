<x-dropdown>
    <x-slot name="trigger">
        <button class="flex py-2 pl-3 pr-9 text-sm font-semibold lg:inline-flex w-full text-left lg:w-32">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
        <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button> 
    </x-slot>
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category','page')) }}" :active="request()->routeIs('home')">
        All
    </x-dropdown-item>
    @foreach ($category as $c)
        <x-dropdown-item href="/?category={{ $c->slug }}&{{ http_build_query(request()->except('category','page')) }}" :active='request()->is("categories/{$c->slug}")'>
            {{ ucwords($c->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>